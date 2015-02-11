<?php

/**
 * This is the model class for table "otr_main".
 *
 * The followings are the available columns in table 'otr_main':
 * @property integer $id
 * @property string $date1
 * @property string $date2
 * @property string $place
 * @property string $surgeon
 * @property string $clinician
 * @property string $phone
 * @property string $return_date
 * @property string $notes
 * @property integer $type
 */
class OtrMain extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'otr_main';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surgeon, clinician', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('place', 'length', 'max'=>11),
			array('surgeon', 'length', 'max'=>500),
			array('clinician', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>145),
			array('notes', 'length', 'max'=>45),
			array('date1, date2, return_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date1, date2, place, surgeon, clinician, phone, return_date, notes, type', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'date1' => 'Date1',
			'date2' => 'Date2',
			'place' => 'Place',
			'surgeon' => 'Surgeon',
			'clinician' => 'Clinician',
			'phone' => 'Phone',
			'return_date' => 'Return Date',
			'notes' => 'Notes',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('date1',$this->date1,true);
		$criteria->compare('date2',$this->date2,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('surgeon',$this->surgeon,true);
		$criteria->compare('clinician',$this->clinician,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('return_date',$this->return_date,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OtrMain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
