<?php

/**
 * This is the model class for table "e_appointments".
 *
 * The followings are the available columns in table 'e_appointments':
 * @property string $ono
 * @property string $date
 * @property string $time
 * @property string $doctor
 * @property string $description
 * @property string $createby
 * @property string $createdate
 */
class EAppointments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_appointments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ono, doctor, createby', 'required'),
			array('ono', 'length', 'max'=>10),
			array('time', 'length', 'max'=>12),
			array('doctor, createby', 'length', 'max'=>45),
			array('description, createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ono, date, time, doctor, description, createby, createdate', 'safe', 'on'=>'search'),
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
			'ono' => 'Ono',
			'date' => 'Date',
			'time' => 'Time',
			'doctor' => 'Doctor',
			'description' => 'Description',
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

		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('doctor',$this->doctor,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return EAppointments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
