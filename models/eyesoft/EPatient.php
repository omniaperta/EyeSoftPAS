<?php

namespace OEModule\EyeSoftPAS\models\eyesoft;
use OEModule\EyeSoftPAS\models;

/**
 * This is the model class for table "e_patient".
 *
 * The followings are the available columns in table 'e_patient':
 * @property integer $pno
 * @property string $regdate
 * @property string $regtime
 * @property string $hosp_no
 * @property string $nhif_no
 * @property string $diabetic_no
 * @property string $fname
 * @property string $sname
 * @property string $surname
 * @property string $balozi
 * @property string $birthdate
 * @property string $sex
 * @property string $marital
 * @property string $tribe
 * @property integer $insuarance
 * @property string $religion
 * @property string $allergy
 * @property string $occupation
 * @property string $address
 * @property integer $country
 * @property string $region
 * @property string $district
 * @property string $ward
 * @property string $town
 * @property string $cell1
 * @property string $cell2
 * @property string $refferedby
 * @property string $registered
 * @property string $insurance_code
 * @property string $insurance_voteno
 * @property string $insurance_type
 * @property integer $last_ono
 * @property string $email
 * @property string $createby
 * @property string $createdate
 * @property string $modifyby
 * @property string $modifydate
 */
class EPatient extends models\PasAssignedEntity
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('insuarance, country, last_ono', 'numerical', 'integerOnly'=>true),
			array('hosp_no', 'length', 'max'=>12),
			array('nhif_no, diabetic_no, tribe', 'length', 'max'=>11),
			array('fname, sname, surname, balozi', 'length', 'max'=>60),
			array('sex', 'length', 'max'=>5),
			array('marital, cell1, cell2, refferedby, registered, insurance_code, insurance_voteno, insurance_type, createby, modifyby', 'length', 'max'=>45),
			array('religion, allergy, occupation, address', 'length', 'max'=>100),
			array('region, district, ward', 'length', 'max'=>10),
			array('town', 'length', 'max'=>111),
			array('email', 'length', 'max'=>120),
			array('regdate, regtime, birthdate, createdate, modifydate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pno, regdate, regtime, hosp_no, nhif_no, diabetic_no, fname, sname, surname, balozi, birthdate, sex, marital, tribe, insuarance, religion, allergy, occupation, address, country, region, district, ward, town, cell1, cell2, refferedby, registered, insurance_code, insurance_voteno, insurance_type, last_ono, email, createby, createdate, modifyby, modifydate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pno' => 'Pno',
			'regdate' => 'Regdate',
			'regtime' => 'Regtime',
			'hosp_no' => 'Hosp No',
			'nhif_no' => 'Nhif No',
			'diabetic_no' => 'Diabetic No',
			'fname' => 'Fname',
			'sname' => 'Sname',
			'surname' => 'Surname',
			'balozi' => 'Balozi',
			'birthdate' => 'Birthdate',
			'sex' => 'Sex',
			'marital' => 'Marital',
			'tribe' => 'Tribe',
			'insuarance' => 'Insuarance',
			'religion' => 'Religion',
			'allergy' => 'Allergy',
			'occupation' => 'Occupation',
			'address' => 'Address',
			'country' => 'Country',
			'region' => 'Region',
			'district' => 'District',
			'ward' => 'Ward',
			'town' => 'Town',
			'cell1' => 'Cell1',
			'cell2' => 'Cell2',
			'refferedby' => 'Refferedby',
			'registered' => 'Registered',
			'insurance_code' => 'Insurance Code',
			'insurance_voteno' => 'Insurance Voteno',
			'insurance_type' => 'Insurance Type',
			'last_ono' => 'Last Ono',
			'email' => 'Email',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'modifyby' => 'Modifyby',
			'modifydate' => 'Modifydate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pno',$this->pno);
		$criteria->compare('regdate',$this->regdate,true);
		$criteria->compare('regtime',$this->regtime,true);
		$criteria->compare('hosp_no',$this->hosp_no,true);
		$criteria->compare('nhif_no',$this->nhif_no,true);
		$criteria->compare('diabetic_no',$this->diabetic_no,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('sname',$this->sname,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('balozi',$this->balozi,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('marital',$this->marital,true);
		$criteria->compare('tribe',$this->tribe,true);
		$criteria->compare('insuarance',$this->insuarance);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('allergy',$this->allergy,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('ward',$this->ward,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('cell1',$this->cell1,true);
		$criteria->compare('cell2',$this->cell2,true);
		$criteria->compare('refferedby',$this->refferedby,true);
		$criteria->compare('registered',$this->registered,true);
		$criteria->compare('insurance_code',$this->insurance_code,true);
		$criteria->compare('insurance_voteno',$this->insurance_voteno,true);
		$criteria->compare('insurance_type',$this->insurance_type,true);
		$criteria->compare('last_ono',$this->last_ono);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('modifyby',$this->modifyby,true);
		$criteria->compare('modifydate',$this->modifydate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EPatient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
