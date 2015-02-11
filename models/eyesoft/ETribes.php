<?php

/**
 * This is the model class for table "e_tribes".
 *
 * The followings are the available columns in table 'e_tribes':
 * @property string $tribe_id
 * @property string $tribe_code
 * @property string $tribe_name
 * @property integer $is_additional
 */
class ETribes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_tribes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tribe_code', 'required'),
			array('is_additional', 'numerical', 'integerOnly'=>true),
			array('tribe_code, tribe_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tribe_id, tribe_code, tribe_name, is_additional', 'safe', 'on'=>'search'),
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
			'tribe_id' => 'Tribe',
			'tribe_code' => 'Tribe Code',
			'tribe_name' => 'Tribe Name',
			'is_additional' => 'Is Additional',
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

		$criteria->compare('tribe_id',$this->tribe_id,true);
		$criteria->compare('tribe_code',$this->tribe_code,true);
		$criteria->compare('tribe_name',$this->tribe_name,true);
		$criteria->compare('is_additional',$this->is_additional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ETribes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
