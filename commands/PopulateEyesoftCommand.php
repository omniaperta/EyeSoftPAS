<?php

namespace OEModule\EyeSoftPAS\commands;

use OEModule\EyeSoftPAS\models\eyesoft\EPatient;
use OEModule\EyeSoftPAS\models\eyesoft\ERegion;
use OEModule\EyeSoftPAS\models\eyesoft\EDistrict;
use OEModule\EyeSoftPAS\models\eyesoft\Country as ECountry;
use OEModule\EyeSoftPAS\models\eyesoft\ETribes;

class PopulateEyesoftCommand extends \CConsoleCommand
{

	public function getHelp()
	{
		return "yiic populateeyesoft\n\n" .
		"Populates eyesoft database with patient data from OE.\n";
	}

	public function run()
	{
		$this->populateTribes();
		$tribes = ETribes::model()->findAll();
		$balozis = array(
			'John Smith',
			'Jack Jones',
			'Mary Sherry',
			'Bill Aylward',
		);
		foreach (\Patient::model()->with(array('contact', 'contact.address'))->findAll(array('condition' => "address.county != ''")) as $patient) {
			echo "$patient->id...";
			$pas_patient = new EPatient();
			$region = null;
			$district = null;
			$country = null;
			if ($patient->contact->address) {
				$region = ERegion::model()->find('region_name = :region_name', array(':region_name' => $patient->contact->address->county));
				if (!$region) {
					$max_region = ERegion::model()->find(array('order' => 'region_code desc'));
					$region = new ERegion();
					$region->region_name = $patient->contact->address->county;
					$region->is_additional = 0;
					$region->region_code = ($max_region) ? $max_region->region_code + 1 : 1;
					$region->save();
				}
				$district = EDistrict::model()->find('district_name = :district_name', array(':district_name' => $patient->contact->address->city));
				if (!$district) {
					$max_district = EDistrict::model()->find(array('order' => 'district_code desc'));
					$district = new EDistrict();
					$district->district_name = $patient->contact->address->city;
					$district->district_code = ($max_district) ? $max_district->district_code + 1 : 1;
					$district->region = $region->region_id;
					$district->save();
				}
				$country = ECountry::model()->find('COUNTRYNAME = :country_name', array(':country_name' => $patient->contact->address->country->name));
				if (!$country) {
					$max_country = ECountry::model()->find(array('order' => 'COUNTRYCODE desc'));
					$country = new ECountry();
					$country->COUNTRYNAME = $patient->contact->address->country->name;
					$country->COUNTRYCODE = ($max_country) ? $max_country->COUNTRYCODE + 1 : 1;
					$country->CURRENCYCODE = 'XXX';
					$country->CURRENCYDESCRIPTION = 'XXX';
					$country->save();
				}
			}
			$tribe_id = (rand(0,7)) ? $tribes[rand(0,count($tribes)-1)]->tribe_id : null;
			$balozi = (rand(0,7)) ? $balozis[rand(0,count($balozis)-1)] : null;
			$attributes = array(
				'regdate' => date('Y-m-d', strtotime($patient->last_modified_date)),
				'regtime' => date('H:i:s', strtotime($patient->last_modified_date)),
				'hosp_no' => (rand(0, 7)) ? rand(55000, 55999) : null,
				'diabetic_no' => (rand(0, 7)) ? rand(66000, 66999) : null,
				'fname' => $patient->first_name,
				'sname' => ucfirst(strtolower(strrev($patient->last_name))),
				'surname' => $patient->last_name,
				'birthdate' => $patient->dob,
				'pno' => $patient->hos_num,
				'cell1' => ($patient->primary_phone && rand(0, 7)) ? $patient->primary_phone : null,
				'cell2' => ($patient->primary_phone && rand(0, 1)) ? strrev($patient->primary_phone) : null,
				'sex' => $patient->gender,
				'address' => ($patient->contact->address) ? $patient->contact->address->address1 : null,
				'country' => ($country) ? $country->COUNTRYCODE : null,
				'town' => ($patient->contact->address) ? $patient->contact->address->city : null,
				'region' => ($region) ? $region->region_id : null,
				'district' => ($district) ? $district->district_id : null,
				'email' => ($patient->contact->address) ? $patient->contact->address->email : null,
				'tribe' => $tribe_id,
				'balozi' => $balozi,
			);
			$pas_patient->attributes = $attributes;
			$pas_patient->save();
			echo "done\n";
		}
	}

	protected function populateTribes() {
		$tribes = array(
			'Alagwa',
			'Akiek',
			'Akie Northern Tanzania',
			'Arusha',
			'Assa',
			'Barabaig',
			'Balouch Coastal Tanzania',
			'Bembe',
			'Bena',
			'Bende',
			'Bondei',
			'Bungu',
			'Burunge',
			'Chaga',
			'Datooga',
			'Dhaiso',
			'Digo',
			'Doe',
			'Fipa',
			'Gogo',
			'Goa Coastal Tanzania',
			'Gorowa',
			'Gujirati Coastal Tanzania',
			'Gweno',
			'Ha',
			'Hutu Western Tanzania Kagera',
			'Hadza',
			'Hangaza',
			'Haya',
			'Hehe',
			'Holoholo people',
			'Ikizu',
			'Ikoma',
			'Iraqw',
			'Isanzu',
			'Jiji',
			'Jita',
			'Kabwa',
			'Kagura',
			'Kaguru',
			'Kahe',
			'Kami',
			'Kamba Northern Tanzania',
			'Kara (also called Regi)',
			'Kerewe',
			'Kimbu',
			'Kinga',
			'Kisankasa',
			'Kisi',
			'Konongo',
			'Kuria',
			'Kutu',
			"Kw'adza",
			'Kwavi',
			'Kwaya',
			'Kwere',
			'Kwifa',
			'Lambya',
			'Luguru',
			'Luo',
			'Maasai',
			'Machinga',
			'Magoma',
			'Mbulu (in Arusha)',
			'Makonde',
			'Makua',
			'Makwe',
			'Malila',
			'Mambwe',
			'Manyema',
			'Manda',
			'Mahara',
			'Mediak',
			'Matengo',
			'Matumbi',
			'Maviha',
			'Mbugwe',
			'Mbunga',
			'Mbugu',
			'Meru (Wameru of the slopes of Mt. Meru in Arumeru District)',
			'Mosiro',
			'Mpoto',
			'Msur Zanzibar',
			'Mwanga',
			'Mwera',
			'Ndali',
			'Ndamba',
			'Ndendeule',
			'Ndengereko',
			'Ndonde',
			'Nyanja people Southern Tanzania',
			'Ngas Northern Tanzania',
			'Ngasa',
			'Ngindo',
			'Ngoni',
			'Ngulu',
			'Ngazija (Zanzibar island)',
			'Ngurimi',
			'Ngwele',
			'Nilamba',
			'Nindi',
			'Nyakyusa',
			'Nyasa people in Mbeya',
			'Nyambo',
			'Nyamwanga',
			'Nyamwezi',
			'Nyanyembe',
			'Nyaturu',
			'Nyiha',
			'Nyiramba',
			'Omotik',
			'Okiek people',
			'Pangwa',
			'Pare',
			'Pimbwe',
			'Pogolo',
			'Rangi',
			'Rufiji',
			'Rungi',
			'Rungu',
			'Rungwa',
			'Rwa',
			'Safwa',
			'Sagara',
			'Sandawe',
			'Sangu',
			'Segeju',
			'Swengwear',
			'Shambaa',
			'Shirazi',
			'Shubi',
			'Sizaki',
			'Suba',
			'Sukuma',
			'Sumbwa',
			'Sungu Tanga',
			'Swahili',
			'Temi',
			'Tongwe',
			'Twa Western Tanzania',
			'Tutsi Western Tanzania',
			'Tumbuka',
			'Vidunda',
			'Vinza',
			'Wanda',
			'Washihiri Zanzibar',
			'Wamanga Zanzibar and Mafia island',
			'Wanji',
			'Wangarenaro Arusha',
			'Ware',
			'Yaaku people Northern Tanzania',
			'Yao',
			'Zanaki',
			'Zaramo',
			'Zigula',
			'Zinza',
			'Zyoba',
			'Zulu people Southern Tanzania',
		);
		foreach($tribes as $tribe_name) {
			if(!$tribe = ETribes::model()->find('tribe_name = :tribe_name', array(':tribe_name' => $tribe_name))) {
				$max_tribe = ETribes::model()->find(array('order' => 'abs(tribe_code) desc'));
				$tribe = new ETribes();
				$tribe->tribe_name = $tribe_name;
				$tribe->is_additional = 0;
				$tribe->tribe_code = ($max_tribe) ? $max_tribe->tribe_code + 1 : 1;
				$tribe->save();
			}
		}
	}

}
