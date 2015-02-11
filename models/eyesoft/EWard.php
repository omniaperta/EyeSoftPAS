<?php

/**
 * This is the model class for table "e_ward".
 *
 * The followings are the available columns in table 'e_ward':
 * @property integer $ward_id
 * @property integer $ward_code
 * @property string $ward_name
 * @property integer $district
 */
class EWard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_ward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ward_code, ward_name, district', 'required'),
			array('ward_code, district', 'numerical', 'integerOnly'=>true),
			array('ward_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ward_id, ward_code, ward_name, district', 'safe', 'on'=>'search'),
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
			'ward_id' => 'Ward',
			'ward_code' => 'Ward Code',
			'ward_name' => 'Ward Name',
			'district' => 'District',
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

		$criteria->compare('ward_id',$this->ward_id);
		$criteria->compare('ward_code',$this->ward_code);
		$criteria->compare('ward_name',$this->ward_name,true);
		$criteria->compare('district',$this->district);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EWard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
