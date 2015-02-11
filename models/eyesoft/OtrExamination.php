<?php

/**
 * This is the model class for table "otr_examination".
 *
 * The followings are the available columns in table 'otr_examination':
 * @property integer $visit
 * @property string $diagnosis
 * @property string $adult_male
 * @property string $adult_female
 * @property string $child_male
 * @property string $child_female
 * @property string $registerby
 * @property string $registerdate
 */
class OtrExamination extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'otr_examination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visit', 'numerical', 'integerOnly'=>true),
			array('diagnosis, adult_male, adult_female, child_male, child_female', 'length', 'max'=>11),
			array('registerby', 'length', 'max'=>45),
			array('registerdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('visit, diagnosis, adult_male, adult_female, child_male, child_female, registerby, registerdate', 'safe', 'on'=>'search'),
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
			'visit' => 'Visit',
			'diagnosis' => 'Diagnosis',
			'adult_male' => 'Adult Male',
			'adult_female' => 'Adult Female',
			'child_male' => 'Child Male',
			'child_female' => 'Child Female',
			'registerby' => 'Registerby',
			'registerdate' => 'Registerdate',
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

		$criteria->compare('visit',$this->visit);
		$criteria->compare('diagnosis',$this->diagnosis,true);
		$criteria->compare('adult_male',$this->adult_male,true);
		$criteria->compare('adult_female',$this->adult_female,true);
		$criteria->compare('child_male',$this->child_male,true);
		$criteria->compare('child_female',$this->child_female,true);
		$criteria->compare('registerby',$this->registerby,true);
		$criteria->compare('registerdate',$this->registerdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OtrExamination the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
