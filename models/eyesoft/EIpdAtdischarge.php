<?php

/**
 * This is the model class for table "e_ipd_atdischarge".
 *
 * The followings are the available columns in table 'e_ipd_atdischarge':
 * @property string $dno
 * @property double $ono
 * @property string $date
 * @property string $doctor1
 * @property string $doctor2
 * @property string $va_pre_re
 * @property string $va_pre_le
 * @property string $va_pin_re
 * @property string $va_pin_le
 * @property string $iop_re
 * @property string $iop_le
 * @property string $observation_re
 * @property string $observation_le
 * @property string $comments
 * @property string $createdby
 * @property string $createdate
 */
class EIpdAtdischarge extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_ipd_atdischarge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor1, doctor2, createdby', 'required'),
			array('ono', 'numerical'),
			array('doctor1, iop_re, iop_le', 'length', 'max'=>45),
			array('doctor2, createdby', 'length', 'max'=>145),
			array('va_pre_re, va_pre_le, va_pin_re, va_pin_le', 'length', 'max'=>11),
			array('observation_re, observation_le', 'length', 'max'=>345),
			array('date, comments, createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dno, ono, date, doctor1, doctor2, va_pre_re, va_pre_le, va_pin_re, va_pin_le, iop_re, iop_le, observation_re, observation_le, comments, createdby, createdate', 'safe', 'on'=>'search'),
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
			'dno' => 'Dno',
			'ono' => 'Ono',
			'date' => 'Date',
			'doctor1' => 'Doctor1',
			'doctor2' => 'Doctor2',
			'va_pre_re' => 'Va Pre Re',
			'va_pre_le' => 'Va Pre Le',
			'va_pin_re' => 'Va Pin Re',
			'va_pin_le' => 'Va Pin Le',
			'iop_re' => 'Iop Re',
			'iop_le' => 'Iop Le',
			'observation_re' => 'Observation Re',
			'observation_le' => 'Observation Le',
			'comments' => 'Comments',
			'createdby' => 'Createdby',
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

		$criteria->compare('dno',$this->dno,true);
		$criteria->compare('ono',$this->ono);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('doctor1',$this->doctor1,true);
		$criteria->compare('doctor2',$this->doctor2,true);
		$criteria->compare('va_pre_re',$this->va_pre_re,true);
		$criteria->compare('va_pre_le',$this->va_pre_le,true);
		$criteria->compare('va_pin_re',$this->va_pin_re,true);
		$criteria->compare('va_pin_le',$this->va_pin_le,true);
		$criteria->compare('iop_re',$this->iop_re,true);
		$criteria->compare('iop_le',$this->iop_le,true);
		$criteria->compare('observation_re',$this->observation_re,true);
		$criteria->compare('observation_le',$this->observation_le,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('createdby',$this->createdby,true);
		$criteria->compare('createdate',$this->createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EIpdAtdischarge the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
