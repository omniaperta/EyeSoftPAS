<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

namespace OEModule\EyeSoftPAS\components;
use OEModule\EyeSoftPAS\models;
use Yii;

class PasService
{
	/**
	 * @return PasService
	 */
	static public function load()
	{
		return new self(models\PasAssignment::model());
	}

	protected $assign;
	protected $available;

	/**
	 * @param PasAssignment $assign PasAssignment static model
	 */
	public function __construct(models\PasAssignment $assign)
	{
		$this->assign = $assign;
	}

	/**
	 * Is PAS enabled and up?
	 */
	public function isAvailable()
	{
		if (!isset($this->available)) {
			$this->setAvailable(isset(Yii::app()->params['eyesoftpas_enabled']) && Yii::app()->params['eyesoftpas_enabled'] === true);
		}
		return $this->available;
	}

	/**
	 * @param boolean $available
	 */
	public function setAvailable($available = true)
	{
		$this->available = $available;

		if ($available == false) {
			Yii::log('PAS is not available, displayed data may be out of date', 'trace');
			if (Yii::app() instanceof CWebApplication) {
				Yii::app()->user->setFlash('warning.pas_unavailable', 'PAS is currently unavailable, some data may be out of date or incomplete');
			}
		}
	}

	public function handlePASException($e)
	{
		$logmsg = "PAS DB exception: ".$e->getMessage()."\n";

		foreach ($e->getTrace() as $i => $item) {
			if ($i <10) $i = ' '.$i;
			$logmsg .= $i.'. '.@$item['class'].@$item['type'].$item['function'].'()';
			if (isset($item['file']) && isset($item['line'])) {
				$logmsg .= ' '.$item['file'].':'.$item['line'];
			}
			$logmsg .= "\n";
		}

		Yii::log($logmsg);

		$this->setAvailable(false);
	}

	/**
	 * Update patient from PAS
	 * @param Patient $patient
	 * @param PasAssignment $assignment
	 */
	public function updatePatientFromPas($patient, $assignment)
	{
		if (!$this->isAvailable()) return;

		try {
			Yii::log("Pulling data from PAS for Patient: Patient->id: {$patient->id}, PasAssignment->id: {$assignment->id}, PasAssignment->external_id: {$assignment->external_id}", 'trace');
			if (!$assignment->external_id) {
				// Without an external ID we have no way of looking up the patient in PAS
				throw new CException("Patient assignment has no external ID: PasAssignment->id: {$assignment->id}");
			}

			if (($pas_patient = $assignment->getExternal())) {
				Yii::log("Found patient in PAS", 'trace');
				$patient_attrs = array(
						'gender' => $pas_patient->sex,
						'dob' => $pas_patient->birthdate,
						'ethnic_group_id' => null,
						'pas_key' => $pas_patient->pno,
						'hos_num' => $pas_patient->pno,
						'nhs_num' => '',
				);
				$patient->attributes = $patient_attrs;

				// Save
				if (!$patient->save()) {
					throw new CException('Cannot save patient: '.print_r($patient->getErrors(),true));
				}

				$contact = $patient->contact;
				$contact->title = null;
				$contact->first_name = $pas_patient->fname;
				$contact->last_name = $pas_patient->surname;
				$contact->primary_phone = $pas_patient->cell1;
				if (!$contact->save()) {
					throw new CException('Cannot save patient contact: '.print_r($contact->getErrors(),true));
				}

				$assignment->internal_id = $patient->id;
				if (!$assignment->save()) {
					throw new CException('Cannot save patient assignment: '.print_r($assignment->getErrors(),true));
				}

				// Address
				if ($pas_patient->address) {
					if (!$contact->address) {
						Yii::log("Patient address not found, creating", 'trace');
						$address = new \Address;
						$address->contact_id = $contact->id;
					}
					$address->address1 = $pas_patient->address;
					$address->city = $pas_patient->town;
					$address->email = $pas_patient->email;
					$country_id = 1;
					if($default_country_code = Yii::app()->params['default_country_code']) {
						$country = \Country::model()->findByAttributes(array('code' => $default_country_code));
						$country_id = ($country) ? $country->id : 1;
					}
					$address->country_id = $country_id;

					if (!$address->save()) {
						throw new CException('Cannot save patient address: '.print_r($address->getErrors(),true));
					}
				} else if($contact->address) {
					$contact->address->delete();
				}

				// Advisory locks cannot be nested so release patient lock here
				$assignment->unlock();

			} else {
				Yii::log("Patient with external ID '{$assignment->external_id}' not found in PAS", 'warning');
				$assignment->missing_from_pas = 1;
				$assignment->save();

				if (Yii::app() instanceof CWebApplication) {
					Yii::app()->user->setFlash('warning.pas_record_missing', 'Patient not found in PAS, some data may be out of date or incomplete');
				}
			}
		} catch (CDbException $e) {
			$this->handlePASException($e);
		}
	}

	/**
	 * Perform a search based on form $_POST data from the patient search page
	 * Search against PAS data and then import the data into OpenEyes database
	 * @param array $data
	 * @param integer $num_results
	 * @param integer $page
	 */
	public function search($data, $num_results = 20, $page = 0)
	{
		if (!$this->isAvailable()) return;

		try {
			Yii::log('Searching PAS', 'trace');

			$whereSql = array();
			$whereParams = array();

			// Hospital number (patient number)
			if (!empty($data['hos_num'])) {
				$whereSql[] = "pno = :hos_num";
				$whereParams[':hos_num'] = $data['hos_num'];
			}

			// Name
			if (!empty($data['first_name']) && !empty($data['last_name'])) {
				$whereSql[] = "lower(fname) = :first_name AND lower(surname) = :last_name";
				$whereParams[':first_name'] = $data['first_name'];
				$whereParams[':last_name'] = $data['last_name'];
			}

			$limit = $num_results;
			$offset = $page * $num_results;

			switch ($data['sortBy']) {
				case 'HOS_NUM*1':
					// hos_num
					$sort_by = "pno";
					break;
				case 'FIRST_NAME':
					// first_name
					$sort_by = "fname";
					break;
				case 'LAST_NAME':
					// last_name
					$sort_by = "surname";
					break;
				case 'DOB':
					// date of birth
					$sort_by = "birthdate";
					break;
				case 'GENDER':
					// gender
					$sort_by = "sex";
					break;
				default:
					$sort_by = "pno";
			}

			$sort_dir = ($data['sortDir'] == 'asc' ? 'ASC' : 'DESC');

			$whereSql = implode(' AND ', $whereSql);

			$sql = "
			SELECT pno
			FROM e_patient
			WHERE $whereSql
			ORDER BY $sort_by $sort_dir
			LIMIT $offset,$limit
			";

			$command = Yii::app()->db_pas->createCommand($sql);
			$command->bindValues($whereParams);
			$results = $command->queryAll();

			Yii::log(var_export($results,true));
			foreach ($results as $result) {
				// See if the patient is in openeyes, if not then fetch from PAS
				//Yii::log("Fetching assignment for patient: pno:" . $result['pno'], 'trace');
				$this->createOrUpdatePatient($result['pno']);
			}
		} catch (CDbException $e) {
			$this->handlePASException($e);
		}
	}

	/**
	 * Try to find patient assignment in OpenEyes and if necessary create a new one and populate it from PAS
	 * @param string $pno
	 * @param string $hos_num
	 */
	public function createOrUpdatePatient($pno)
	{
		//Yii::log('Getting assignment','trace');
		$assignment = $this->assign->findByExternal('OEModule\EyeSoftPAS\models\eyesoft\EPatient', $pno, 'Patient');
		if ($assignment->isStale()) {
			$patient = $assignment->internal;
			$this->updatePatientFromPas($patient, $assignment);
		}
		$assignment->unlock();
	}

}
