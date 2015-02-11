<?php

/**
 * This is the model class for table "b_insurance".
 *
 * The followings are the available columns in table 'b_insurance':
 * @property string $id
 * @property string $name
 * @property string $contact_person
 * @property string $address
 * @property string $tel
 * @property double $amount
 * @property string $description
 * @property string $has_card
 * @property string $has_pricelist
 * @property integer $is_donor
 */
class BInsurance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'b_insurance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, contact_person', 'required'),
			array('is_donor', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>225),
			array('contact_person, has_card', 'length', 'max'=>245),
			array('address', 'length', 'max'=>145),
			array('tel', 'length', 'max'=>45),
			array('has_pricelist', 'length', 'max'=>1),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, contact_person, address, tel, amount, description, has_card, has_pricelist, is_donor', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'contact_person' => 'Contact Person',
			'address' => 'Address',
			'tel' => 'Tel',
			'amount' => 'Amount',
			'description' => 'Description',
			'has_card' => 'Has Card',
			'has_pricelist' => 'Has Pricelist',
			'is_donor' => 'Is Donor',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('has_card',$this->has_card,true);
		$criteria->compare('has_pricelist',$this->has_pricelist,true);
		$criteria->compare('is_donor',$this->is_donor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BInsurance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
