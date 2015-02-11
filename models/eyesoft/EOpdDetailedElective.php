<?php

/**
 * This is the model class for table "e_opd_detailed_elective".
 *
 * The followings are the available columns in table 'e_opd_detailed_elective':
 * @property string $ono
 * @property string $date
 * @property string $pno
 * @property string $surgery
 * @property string $premedication
 * @property string $anaesthesia
 * @property string $surgeon
 * @property string $eye
 * @property string $addedby
 * @property string $addeddate
 */
class EOpdDetailedElective extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_opd_detailed_elective';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pno, surgery, premedication, anaesthesia, surgeon, eye', 'required'),
			array('pno, surgery, premedication, anaesthesia', 'length', 'max'=>11),
			array('surgeon', 'length', 'max'=>345),
			array('eye', 'length', 'max'=>45),
			array('addedby', 'length', 'max'=>50),
			array('addeddate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ono, date, pno, surgery, premedication, anaesthesia, surgeon, eye, addedby, addeddate', 'safe', 'on'=>'search'),
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
			'ono' => 'Ono',
			'date' => 'Date',
			'pno' => 'Pno',
			'surgery' => 'Surgery',
			'premedication' => 'Premedication',
			'anaesthesia' => 'Anaesthesia',
			'surgeon' => 'Surgeon',
			'eye' => 'Eye',
			'addedby' => 'Addedby',
			'addeddate' => 'Addeddate',
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

		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('pno',$this->pno,true);
		$criteria->compare('surgery',$this->surgery,true);
		$criteria->compare('premedication',$this->premedication,true);
		$criteria->compare('anaesthesia',$this->anaesthesia,true);
		$criteria->compare('surgeon',$this->surgeon,true);
		$criteria->compare('eye',$this->eye,true);
		$criteria->compare('addedby',$this->addedby,true);
		$criteria->compare('addeddate',$this->addeddate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EOpdDetailedElective the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
