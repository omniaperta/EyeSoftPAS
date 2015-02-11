<?php

/**
 * This is the model class for table "archive_billing".
 *
 * The followings are the available columns in table 'archive_billing':
 * @property integer $id
 * @property string $billno
 * @property string $ono
 * @property string $insurance
 * @property string $cost
 * @property string $paid
 * @property string $balance
 * @property string $payin
 * @property string $currency
 * @property integer $currency_rate
 * @property integer $currency_value
 * @property integer $refunded
 * @property integer $visit_type
 * @property integer $indpt
 * @property integer $discarded
 * @property integer $archived
 * @property integer $extra_charges
 * @property string $createdby
 * @property string $createdate
 * @property string $authorizedby
 * @property string $authorizeddate
 */
class ArchiveBilling extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archive_billing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ono, insurance, createdby, authorizedby', 'required'),
			array('currency_rate, currency_value, refunded, visit_type, indpt, discarded, archived, extra_charges', 'numerical', 'integerOnly'=>true),
			array('billno', 'length', 'max'=>10),
			array('ono, insurance, cost, paid, balance, currency', 'length', 'max'=>11),
			array('payin, createdby', 'length', 'max'=>45),
			array('authorizedby', 'length', 'max'=>100),
			array('createdate, authorizeddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, billno, ono, insurance, cost, paid, balance, payin, currency, currency_rate, currency_value, refunded, visit_type, indpt, discarded, archived, extra_charges, createdby, createdate, authorizedby, authorizeddate', 'safe', 'on'=>'search'),
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
			'insurance' => 'Insurance',
			'cost' => 'Cost',
			'paid' => 'Paid',
			'balance' => 'Balance',
			'payin' => 'Payin',
			'currency' => 'Currency',
			'currency_rate' => 'Currency Rate',
			'currency_value' => 'Currency Value',
			'refunded' => 'Refunded',
			'visit_type' => 'Visit Type',
			'indpt' => 'Indpt',
			'discarded' => 'Discarded',
			'archived' => 'Archived',
			'extra_charges' => 'Extra Charges',
			'createdby' => 'Createdby',
			'createdate' => 'Createdate',
			'authorizedby' => 'Authorizedby',
			'authorizeddate' => 'Authorizeddate',
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
		$criteria->compare('billno',$this->billno,true);
		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('insurance',$this->insurance,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('paid',$this->paid,true);
		$criteria->compare('balance',$this->balance,true);
		$criteria->compare('payin',$this->payin,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('currency_rate',$this->currency_rate);
		$criteria->compare('currency_value',$this->currency_value);
		$criteria->compare('refunded',$this->refunded);
		$criteria->compare('visit_type',$this->visit_type);
		$criteria->compare('indpt',$this->indpt);
		$criteria->compare('discarded',$this->discarded);
		$criteria->compare('archived',$this->archived);
		$criteria->compare('extra_charges',$this->extra_charges);
		$criteria->compare('createdby',$this->createdby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('authorizedby',$this->authorizedby,true);
		$criteria->compare('authorizeddate',$this->authorizeddate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArchiveBilling the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
