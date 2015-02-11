<?php

/**
 * This is the model class for table "z_flexy".
 *
 * The followings are the available columns in table 'z_flexy':
 * @property string $f0
 * @property string $f1
 * @property string $f2
 * @property string $f3
 * @property string $f4
 * @property string $f5
 * @property string $f6
 * @property string $f7
 * @property string $f8
 */
class ZFlexy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'z_flexy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('f0, f1, f2, f3, f4, f5, f6, f7, f8', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('f0, f1, f2, f3, f4, f5, f6, f7, f8', 'safe', 'on'=>'search'),
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
			'f0' => 'F0',
			'f1' => 'F1',
			'f2' => 'F2',
			'f3' => 'F3',
			'f4' => 'F4',
			'f5' => 'F5',
			'f6' => 'F6',
			'f7' => 'F7',
			'f8' => 'F8',
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

		$criteria->compare('f0',$this->f0,true);
		$criteria->compare('f1',$this->f1,true);
		$criteria->compare('f2',$this->f2,true);
		$criteria->compare('f3',$this->f3,true);
		$criteria->compare('f4',$this->f4,true);
		$criteria->compare('f5',$this->f5,true);
		$criteria->compare('f6',$this->f6,true);
		$criteria->compare('f7',$this->f7,true);
		$criteria->compare('f8',$this->f8,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ZFlexy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
