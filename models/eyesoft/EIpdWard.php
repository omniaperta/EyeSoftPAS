<?php

/**
 * This is the model class for table "e_ipd_ward".
 *
 * The followings are the available columns in table 'e_ipd_ward':
 * @property string $wno
 * @property double $ono
 * @property string $date
 * @property string $doctor1
 * @property string $doctor2
 * @property string $vaprl
 * @property string $vaprr
 * @property string $dnotes
 * @property string $iopl
 * @property string $iopr
 * @property string $lle
 * @property string $lre
 * @property string $rle
 * @property string $rre
 * @property integer $notseen
 * @property string $createdby
 * @property string $createdate
 */
class EIpdWard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_ipd_ward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor1, doctor2, createdby', 'required'),
			array('notseen', 'numerical', 'integerOnly'=>true),
			array('ono', 'numerical'),
			array('doctor1, iopl, iopr', 'length', 'max'=>45),
			array('doctor2, createdby', 'length', 'max'=>145),
			array('vaprl, vaprr', 'length', 'max'=>10),
			array('lle, lre, rle, rre', 'length', 'max'=>345),
			array('date, dnotes, createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('wno, ono, date, doctor1, doctor2, vaprl, vaprr, dnotes, iopl, iopr, lle, lre, rle, rre, notseen, createdby, createdate', 'safe', 'on'=>'search'),
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
			'wno' => 'Wno',
			'ono' => 'Ono',
			'date' => 'Date',
			'doctor1' => 'Doctor1',
			'doctor2' => 'Doctor2',
			'vaprl' => 'Vaprl',
			'vaprr' => 'Vaprr',
			'dnotes' => 'Dnotes',
			'iopl' => 'Iopl',
			'iopr' => 'Iopr',
			'lle' => 'Lle',
			'lre' => 'Lre',
			'rle' => 'Rle',
			'rre' => 'Rre',
			'notseen' => 'Notseen',
			'createdby' => 'Createdby',
			'createdate' => 'Createdate',
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

		$criteria->compare('wno',$this->wno,true);
		$criteria->compare('ono',$this->ono);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('doctor1',$this->doctor1,true);
		$criteria->compare('doctor2',$this->doctor2,true);
		$criteria->compare('vaprl',$this->vaprl,true);
		$criteria->compare('vaprr',$this->vaprr,true);
		$criteria->compare('dnotes',$this->dnotes,true);
		$criteria->compare('iopl',$this->iopl,true);
		$criteria->compare('iopr',$this->iopr,true);
		$criteria->compare('lle',$this->lle,true);
		$criteria->compare('lre',$this->lre,true);
		$criteria->compare('rle',$this->rle,true);
		$criteria->compare('rre',$this->rre,true);
		$criteria->compare('notseen',$this->notseen);
		$criteria->compare('createdby',$this->createdby,true);
		$criteria->compare('createdate',$this->createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EIpdWard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
