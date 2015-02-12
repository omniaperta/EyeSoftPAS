<?php

namespace OEModule\EyeSoftPAS\models\eyesoft;
use OEModule\EyeSoftPAS\models;

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $COUNTRYCODE
 * @property string $COUNTRYNAME
 * @property integer $MEMBER
 * @property integer $INTERNATIONALORGANISATION
 * @property string $CURRENCYCODE
 * @property string $CURRENCYDESCRIPTION
 * @property string $CREATEDON
 * @property string $CREATEDBY
 * @property string $UPDATEDON
 * @property string $UPDATEDBY
 */
class Country extends \MultiActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	public function connectionId()
	{
		return 'db_pas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COUNTRYCODE, CURRENCYDESCRIPTION', 'required'),
			array('COUNTRYCODE, MEMBER, INTERNATIONALORGANISATION', 'numerical', 'integerOnly'=>true),
			array('COUNTRYNAME', 'length', 'max'=>60),
			array('CURRENCYCODE', 'length', 'max'=>5),
			array('CURRENCYDESCRIPTION', 'length', 'max'=>40),
			array('CREATEDBY, UPDATEDBY', 'length', 'max'=>30),
			array('CREATEDON, UPDATEDON', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COUNTRYCODE, COUNTRYNAME, MEMBER, INTERNATIONALORGANISATION, CURRENCYCODE, CURRENCYDESCRIPTION, CREATEDON, CREATEDBY, UPDATEDON, UPDATEDBY', 'safe', 'on'=>'search'),
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
			'COUNTRYCODE' => 'Countrycode',
			'COUNTRYNAME' => 'Countryname',
			'MEMBER' => 'Member',
			'INTERNATIONALORGANISATION' => 'Internationalorganisation',
			'CURRENCYCODE' => 'Currencycode',
			'CURRENCYDESCRIPTION' => 'Currencydescription',
			'CREATEDON' => 'Createdon',
			'CREATEDBY' => 'Createdby',
			'UPDATEDON' => 'Updatedon',
			'UPDATEDBY' => 'Updatedby',
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

		$criteria->compare('COUNTRYCODE',$this->COUNTRYCODE);
		$criteria->compare('COUNTRYNAME',$this->COUNTRYNAME,true);
		$criteria->compare('MEMBER',$this->MEMBER);
		$criteria->compare('INTERNATIONALORGANISATION',$this->INTERNATIONALORGANISATION);
		$criteria->compare('CURRENCYCODE',$this->CURRENCYCODE,true);
		$criteria->compare('CURRENCYDESCRIPTION',$this->CURRENCYDESCRIPTION,true);
		$criteria->compare('CREATEDON',$this->CREATEDON,true);
		$criteria->compare('CREATEDBY',$this->CREATEDBY,true);
		$criteria->compare('UPDATEDON',$this->UPDATEDON,true);
		$criteria->compare('UPDATEDBY',$this->UPDATEDBY,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
