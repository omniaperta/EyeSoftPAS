<?php

namespace OEModule\EyeSoftPAS\commands;

use OEModule\EyeSoftPAS\models\eyesoft\EPatient;
use OEModule\EyeSoftPAS\models\eyesoft\ERegion;
use OEModule\EyeSoftPAS\models\eyesoft\EDistrict;
use OEModule\EyeSoftPAS\models\eyesoft\Country as ECountry;
use OEModule\EyeSoftPAS\models\eyesoft\ETribes;

class AnonymiseNumbersCommand extends \CConsoleCommand
{

	public function getHelp()
	{
		return "yiic anonymisenumbers\n\n" .
		"Anonymise numbers in eyesoft patient table\n";
	}

	public function run()
	{
		foreach (EPatient::model()->findAll() as $patient) {
			echo "$patient->pno...";

			$str = $patient->cell1;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->cell1 = $str;

			$str = $patient->cell2;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->cell2 = $str;

			$str = $patient->nhif_no;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->nhif_no = $str;

			$str = $patient->diabetic_no;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->diabetic_no = $str;

			$str = $patient->insurance_code;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->insurance_code = $str;

			$str = $patient->insurance_voteno;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->insurance_voteno = $str;

			$str = $patient->address;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->address = $str;

			$str = $patient->hosp_no;
			preg_match_all('/[1-9]/', $str, $matches, PREG_OFFSET_CAPTURE);
			foreach (array_keys($matches[0]) as $match) {
				$str = substr($str, 0, $matches[0][$match][1]) . rand(1,9) . substr($str, $matches[0][$match][1] + 1);
			}
			$patient->hosp_no = $str;

			$patient->save();
			echo "done\n";
		}
	}

}
