<?php

/**
 * This is the model class for table "archive_billing_refund".
 *
 * The followings are the available columns in table 'archive_billing_refund':
 * @property string $id
 * @property string $billno
 * @property string $amount
 * @property string $doctor
 * @property string $comment
 * @property string $refundby
 * @property string $refunddate
 */
class ArchiveBillingRefund extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archive_billing_refund';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor, comment, refundby', 'required'),
			array('billno, amount, doctor', 'length', 'max'=>11),
			array('refundby', 'length', 'max'=>45),
			array('refunddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, billno, amount, doctor, comment, refundby, refunddate', 'safe', 'on'=>'search'),
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
			'amount' => 'Amount',
			'doctor' => 'Doctor',
			'comment' => 'Comment',
			'refundby' => 'Refundby',
			'refunddate' => 'Refunddate',
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
		$criteria->compare('billno',$this->billno,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('doctor',$this->doctor,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('refundby',$this->refundby,true);
		$criteria->compare('refunddate',$this->refunddate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArchiveBillingRefund the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
