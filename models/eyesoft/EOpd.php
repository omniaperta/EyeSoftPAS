<?php

/**
 * This is the model class for table "e_opd".
 *
 * The followings are the available columns in table 'e_opd':
 * @property string $ono
 * @property integer $pno
 * @property string $status
 * @property string $odate
 * @property integer $indpt
 * @property string $discharged_date
 * @property integer $opd
 * @property integer $theatre
 * @property integer $ward
 * @property integer $visittype
 * @property integer $service
 * @property integer $referredby
 * @property integer $notbilled
 * @property string $createby
 * @property string $createdate
 * @property string $modifyby
 * @property string $modifydate
 */
class EOpd extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_opd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pno, service', 'required'),
			array('pno, indpt, opd, theatre, ward, visittype, service, referredby, notbilled', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>45),
			array('createby, modifyby', 'length', 'max'=>50),
			array('odate, discharged_date, createdate, modifydate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ono, pno, status, odate, indpt, discharged_date, opd, theatre, ward, visittype, service, referredby, notbilled, createby, createdate, modifyby, modifydate', 'safe', 'on'=>'search'),
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
			'pno' => 'Pno',
			'status' => 'Status',
			'odate' => 'Odate',
			'indpt' => 'Indpt',
			'discharged_date' => 'Discharged Date',
			'opd' => 'Opd',
			'theatre' => 'Theatre',
			'ward' => 'Ward',
			'visittype' => 'Visittype',
			'service' => 'Service',
			'referredby' => 'Referredby',
			'notbilled' => 'Notbilled',
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

		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('pno',$this->pno);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('odate',$this->odate,true);
		$criteria->compare('indpt',$this->indpt);
		$criteria->compare('discharged_date',$this->discharged_date,true);
		$criteria->compare('opd',$this->opd);
		$criteria->compare('theatre',$this->theatre);
		$criteria->compare('ward',$this->ward);
		$criteria->compare('visittype',$this->visittype);
		$criteria->compare('service',$this->service);
		$criteria->compare('referredby',$this->referredby);
		$criteria->compare('notbilled',$this->notbilled);
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
	 * @return EOpd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
