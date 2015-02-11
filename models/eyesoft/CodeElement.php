<?php

/**
 * This is the model class for table "code_element".
 *
 * The followings are the available columns in table 'code_element':
 * @property integer $CodeTypeID
 * @property string $CodeType
 * @property integer $CATEGORY
 * @property string $type
 * @property string $sorter
 * @property string $code
 * @property integer $region
 * @property integer $district
 * @property integer $charge_times
 */
class CodeElement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'code_element';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CATEGORY', 'required'),
			array('CATEGORY, region, district, charge_times', 'numerical', 'integerOnly'=>true),
			array('CodeType', 'length', 'max'=>255),
			array('type, code', 'length', 'max'=>45),
			array('sorter', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodeTypeID, CodeType, CATEGORY, type, sorter, code, region, district, charge_times', 'safe', 'on'=>'search'),
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
			'CodeTypeID' => 'Code Type',
			'CodeType' => 'Code Type',
			'CATEGORY' => 'Category',
			'type' => 'Type',
			'sorter' => 'Sorter',
			'code' => 'Code',
			'region' => 'Region',
			'district' => 'District',
			'charge_times' => 'Charge Times',
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

		$criteria->compare('CodeTypeID',$this->CodeTypeID);
		$criteria->compare('CodeType',$this->CodeType,true);
		$criteria->compare('CATEGORY',$this->CATEGORY);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('sorter',$this->sorter,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('region',$this->region);
		$criteria->compare('district',$this->district);
		$criteria->compare('charge_times',$this->charge_times);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CodeElement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
