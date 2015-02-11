<?php

/**
 * This is the model class for table "archive_billing_paid_balance".
 *
 * The followings are the available columns in table 'archive_billing_paid_balance':
 * @property string $id
 * @property integer $billno
 * @property string $ono
 * @property string $paid
 * @property string $description
 * @property string $createdby
 * @property string $createdate
 */
class ArchiveBillingPaidBalance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archive_billing_paid_balance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('billno, ono, createdby', 'required'),
			array('billno', 'numerical', 'integerOnly'=>true),
			array('ono, paid', 'length', 'max'=>11),
			array('description', 'length', 'max'=>100),
			array('createdby', 'length', 'max'=>45),
			array('createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, billno, ono, paid, description, createdby, createdate', 'safe', 'on'=>'search'),
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
			'billno' => 'Billno',
			'ono' => 'Ono',
			'paid' => 'Paid',
			'description' => 'Description',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('billno',$this->billno);
		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('paid',$this->paid,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return ArchiveBillingPaidBalance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
