<?php

/**
 * This is the model class for table "e_ipd".
 *
 * The followings are the available columns in table 'e_ipd':
 * @property string $ino
 * @property string $ono
 * @property string $surgery_date
 * @property string $operated_eye_l
 * @property string $operated_eye_r
 * @property string $surgeryType
 * @property string $doctor1
 * @property string $doctor0
 * @property string $doctor2
 * @property string $cat_type
 * @property string $cat_surgery_type
 * @property string $cat_iol_inserted
 * @property string $outcome_r
 * @property string $outcome_l
 * @property string $ascan
 * @property string $recomm_iol
 * @property string $inserted_iol
 * @property string $incision
 * @property double $surture
 * @property string $complications
 * @property string $notes
 * @property integer $anaesthesia
 * @property string $returndate
 * @property integer $notseen
 * @property string $createby
 * @property string $createdate
 */
class EIpd extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_ipd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor1, doctor0, anaesthesia', 'required'),
			array('anaesthesia, notseen', 'numerical', 'integerOnly'=>true),
			array('surture', 'numerical'),
			array('ono, cat_type, cat_surgery_type, cat_iol_inserted, ascan, recomm_iol, inserted_iol, incision', 'length', 'max'=>10),
			array('operated_eye_l, operated_eye_r', 'length', 'max'=>1),
			array('surgeryType', 'length', 'max'=>11),
			array('doctor1, doctor2', 'length', 'max'=>145),
			array('doctor0', 'length', 'max'=>100),
			array('outcome_r, outcome_l, complications', 'length', 'max'=>425),
			array('createby', 'length', 'max'=>240),
			array('surgery_date, notes, returndate, createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ino, ono, surgery_date, operated_eye_l, operated_eye_r, surgeryType, doctor1, doctor0, doctor2, cat_type, cat_surgery_type, cat_iol_inserted, outcome_r, outcome_l, ascan, recomm_iol, inserted_iol, incision, surture, complications, notes, anaesthesia, returndate, notseen, createby, createdate', 'safe', 'on'=>'search'),
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
			'ino' => 'Ino',
			'ono' => 'Ono',
			'surgery_date' => 'Surgery Date',
			'operated_eye_l' => 'Operated Eye L',
			'operated_eye_r' => 'Operated Eye R',
			'surgeryType' => 'Surgery Type',
			'doctor1' => 'Doctor1',
			'doctor0' => 'Doctor0',
			'doctor2' => 'Doctor2',
			'cat_type' => 'Cat Type',
			'cat_surgery_type' => 'Cat Surgery Type',
			'cat_iol_inserted' => 'Cat Iol Inserted',
			'outcome_r' => 'Outcome R',
			'outcome_l' => 'Outcome L',
			'ascan' => 'Ascan',
			'recomm_iol' => 'Recomm Iol',
			'inserted_iol' => 'Inserted Iol',
			'incision' => 'Incision',
			'surture' => 'Surture',
			'complications' => 'Complications',
			'notes' => 'Notes',
			'anaesthesia' => 'Anaesthesia',
			'returndate' => 'Returndate',
			'notseen' => 'Notseen',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
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

		$criteria->compare('ino',$this->ino,true);
		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('surgery_date',$this->surgery_date,true);
		$criteria->compare('operated_eye_l',$this->operated_eye_l,true);
		$criteria->compare('operated_eye_r',$this->operated_eye_r,true);
		$criteria->compare('surgeryType',$this->surgeryType,true);
		$criteria->compare('doctor1',$this->doctor1,true);
		$criteria->compare('doctor0',$this->doctor0,true);
		$criteria->compare('doctor2',$this->doctor2,true);
		$criteria->compare('cat_type',$this->cat_type,true);
		$criteria->compare('cat_surgery_type',$this->cat_surgery_type,true);
		$criteria->compare('cat_iol_inserted',$this->cat_iol_inserted,true);
		$criteria->compare('outcome_r',$this->outcome_r,true);
		$criteria->compare('outcome_l',$this->outcome_l,true);
		$criteria->compare('ascan',$this->ascan,true);
		$criteria->compare('recomm_iol',$this->recomm_iol,true);
		$criteria->compare('inserted_iol',$this->inserted_iol,true);
		$criteria->compare('incision',$this->incision,true);
		$criteria->compare('surture',$this->surture);
		$criteria->compare('complications',$this->complications,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('anaesthesia',$this->anaesthesia);
		$criteria->compare('returndate',$this->returndate,true);
		$criteria->compare('notseen',$this->notseen);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EIpd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
