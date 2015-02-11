<?php

/**
 * This is the model class for table "archive_billing_element".
 *
 * The followings are the available columns in table 'archive_billing_element':
 * @property integer $id
 * @property string $elem
 * @property string $billno
 * @property string $service
 * @property string $amount
 * @property string $description
 */
class ArchiveBillingElement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archive_billing_element';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('elem', 'length', 'max'=>10),
			array('billno, amount', 'length', 'max'=>11),
			array('service', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, elem, billno, service, amount, description', 'safe', 'on'=>'search'),
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
			'elem' => 'Elem',
			'billno' => 'Billno',
			'service' => 'Service',
			'amount' => 'Amount',
			'description' => 'Description',
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
		$criteria->compare('elem',$this->elem,true);
		$criteria->compare('billno',$this->billno,true);
		$criteria->compare('service',$this->service,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArchiveBillingElement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
