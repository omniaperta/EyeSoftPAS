<?php

/**
 * This is the model class for table "e_patient_other".
 *
 * The followings are the available columns in table 'e_patient_other':
 * @property string $pno
 * @property integer $diabetes
 * @property integer $htn
 * @property integer $other
 * @property string $description
 * @property string $createby
 * @property string $createdate
 */
class EPatientOther extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_patient_other';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pno', 'required'),
			array('diabetes, htn, other', 'numerical', 'integerOnly'=>true),
			array('pno', 'length', 'max'=>10),
			array('description, createby', 'length', 'max'=>45),
			array('createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pno, diabetes, htn, other, description, createby, createdate', 'safe', 'on'=>'search'),
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
			'diabetes' => 'Diabetes',
			'htn' => 'Htn',
			'other' => 'Other',
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

		$criteria->compare('pno',$this->pno,true);
		$criteria->compare('diabetes',$this->diabetes);
		$criteria->compare('htn',$this->htn);
		$criteria->compare('other',$this->other);
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
	 * @return EPatientOther the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
