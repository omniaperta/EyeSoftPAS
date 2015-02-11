<?php

/**
 * This is the model class for table "useraccess".
 *
 * The followings are the available columns in table 'useraccess':
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $emailaddress
 * @property string $departmentcode
 * @property string $usergroup
 * @property integer $status
 * @property string $lastlogin
 * @property string $lastlogout
 * @property string $lastchanged
 */
class Useraccess extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'useraccess';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, password, fullname, emailaddress, departmentcode, usergroup', 'length', 'max'=>100),
			array('lastlogin, lastlogout, lastchanged', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, fullname, emailaddress, departmentcode, usergroup, status, lastlogin, lastlogout, lastchanged', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'fullname' => 'Fullname',
			'emailaddress' => 'Emailaddress',
			'departmentcode' => 'Departmentcode',
			'usergroup' => 'Usergroup',
			'status' => 'Status',
			'lastlogin' => 'Lastlogin',
			'lastlogout' => 'Lastlogout',
			'lastchanged' => 'Lastchanged',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('emailaddress',$this->emailaddress,true);
		$criteria->compare('departmentcode',$this->departmentcode,true);
		$criteria->compare('usergroup',$this->usergroup,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('lastlogin',$this->lastlogin,true);
		$criteria->compare('lastlogout',$this->lastlogout,true);
		$criteria->compare('lastchanged',$this->lastchanged,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Useraccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
