<?php

/**
 * This is the model class for table "otr_theatre_element".
 *
 * The followings are the available columns in table 'otr_theatre_element':
 * @property string $id
 * @property integer $pno
 * @property integer $lid
 * @property string $fullname
 * @property integer $age
 * @property string $sex
 * @property string $eye
 * @property string $surgery
 * @property string $va_b4
 * @property string $va_atdischarge
 * @property string $va_6wix
 * @property double $amount
 * @property string $comment
 * @property string $surgeon
 * @property string $createby
 * @property string $createdate
 * @property string $modifyby
 * @property string $modifydate
 */
class OtrTheatreElement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'otr_theatre_element';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pno, fullname, eye, surgeon, createby, modifyby', 'required'),
			array('pno, lid, age', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('fullname', 'length', 'max'=>425),
			array('sex', 'length', 'max'=>2),
			array('eye', 'length', 'max'=>3),
			array('surgery, va_b4, va_atdischarge, va_6wix', 'length', 'max'=>11),
			array('surgeon', 'length', 'max'=>4),
			array('createby, modifyby', 'length', 'max'=>222),
			array('comment, createdate, modifydate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pno, lid, fullname, age, sex, eye, surgery, va_b4, va_atdischarge, va_6wix, amount, comment, surgeon, createby, createdate, modifyby, modifydate', 'safe', 'on'=>'search'),
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
			'pno' => 'Pno',
			'lid' => 'Lid',
			'fullname' => 'Fullname',
			'age' => 'Age',
			'sex' => 'Sex',
			'eye' => 'Eye',
			'surgery' => 'Surgery',
			'va_b4' => 'Va B4',
			'va_atdischarge' => 'Va Atdischarge',
			'va_6wix' => 'Va 6wix',
			'amount' => 'Amount',
			'comment' => 'Comment',
			'surgeon' => 'Surgeon',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'modifyby' => 'Modifyby',
			'modifydate' => 'Modifydate',
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
		$criteria->compare('pno',$this->pno);
		$criteria->compare('lid',$this->lid);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('eye',$this->eye,true);
		$criteria->compare('surgery',$this->surgery,true);
		$criteria->compare('va_b4',$this->va_b4,true);
		$criteria->compare('va_atdischarge',$this->va_atdischarge,true);
		$criteria->compare('va_6wix',$this->va_6wix,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('surgeon',$this->surgeon,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('modifyby',$this->modifyby,true);
		$criteria->compare('modifydate',$this->modifydate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OtrTheatreElement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
