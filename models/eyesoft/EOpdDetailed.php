<?php

/**
 * This is the model class for table "e_opd_detailed".
 *
 * The followings are the available columns in table 'e_opd_detailed':
 * @property integer $id
 * @property string $ono
 * @property string $edate
 * @property string $sdate
 * @property integer $focal
 * @property string $iopl
 * @property string $iopr
 * @property integer $avastin
 * @property integer $probing
 * @property integer $daycase
 * @property string $vawgl
 * @property string $vawgr
 * @property string $vawpl
 * @property string $vawpr
 * @property string $type
 * @property string $yag
 * @property integer $prp
 * @property integer $cpc
 * @property string $var
 * @property string $val
 * @property string $other
 * @property string $doctor1
 * @property string $doctor2
 * @property string $lle
 * @property string $lre
 * @property string $rle
 * @property string $rre
 * @property integer $notseen
 * @property string $notes
 * @property integer $surgeon
 * @property string $eye
 * @property integer $anaesthesia
 * @property string $registerby
 * @property string $registerdate
 */
class EOpdDetailed extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'e_opd_detailed';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ono, lle, lre, surgeon, eye, anaesthesia', 'required'),
			array('focal, avastin, probing, daycase, prp, cpc, notseen, surgeon, anaesthesia', 'numerical', 'integerOnly'=>true),
			array('ono', 'length', 'max'=>10),
			array('iopl, iopr', 'length', 'max'=>2),
			array('vawgl, vawgr, vawpl, vawpr, type, yag, var, val, other', 'length', 'max'=>11),
			array('doctor1, doctor2, registerby', 'length', 'max'=>45),
			array('lle, lre, rle, rre', 'length', 'max'=>345),
			array('eye', 'length', 'max'=>3),
			array('edate, sdate, notes, registerdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ono, edate, sdate, focal, iopl, iopr, avastin, probing, daycase, vawgl, vawgr, vawpl, vawpr, type, yag, prp, cpc, var, val, other, doctor1, doctor2, lle, lre, rle, rre, notseen, notes, surgeon, eye, anaesthesia, registerby, registerdate', 'safe', 'on'=>'search'),
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
			'ono' => 'Ono',
			'edate' => 'Edate',
			'sdate' => 'Sdate',
			'focal' => 'Focal',
			'iopl' => 'Iopl',
			'iopr' => 'Iopr',
			'avastin' => 'Avastin',
			'probing' => 'Probing',
			'daycase' => 'Daycase',
			'vawgl' => 'Vawgl',
			'vawgr' => 'Vawgr',
			'vawpl' => 'Vawpl',
			'vawpr' => 'Vawpr',
			'type' => 'Type',
			'yag' => 'Yag',
			'prp' => 'Prp',
			'cpc' => 'Cpc',
			'var' => 'Var',
			'val' => 'Val',
			'other' => 'Other',
			'doctor1' => 'Doctor1',
			'doctor2' => 'Doctor2',
			'lle' => 'Lle',
			'lre' => 'Lre',
			'rle' => 'Rle',
			'rre' => 'Rre',
			'notseen' => 'Notseen',
			'notes' => 'Notes',
			'surgeon' => 'Surgeon',
			'eye' => 'Eye',
			'anaesthesia' => 'Anaesthesia',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ono',$this->ono,true);
		$criteria->compare('edate',$this->edate,true);
		$criteria->compare('sdate',$this->sdate,true);
		$criteria->compare('focal',$this->focal);
		$criteria->compare('iopl',$this->iopl,true);
		$criteria->compare('iopr',$this->iopr,true);
		$criteria->compare('avastin',$this->avastin);
		$criteria->compare('probing',$this->probing);
		$criteria->compare('daycase',$this->daycase);
		$criteria->compare('vawgl',$this->vawgl,true);
		$criteria->compare('vawgr',$this->vawgr,true);
		$criteria->compare('vawpl',$this->vawpl,true);
		$criteria->compare('vawpr',$this->vawpr,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('yag',$this->yag,true);
		$criteria->compare('prp',$this->prp);
		$criteria->compare('cpc',$this->cpc);
		$criteria->compare('var',$this->var,true);
		$criteria->compare('val',$this->val,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('doctor1',$this->doctor1,true);
		$criteria->compare('doctor2',$this->doctor2,true);
		$criteria->compare('lle',$this->lle,true);
		$criteria->compare('lre',$this->lre,true);
		$criteria->compare('rle',$this->rle,true);
		$criteria->compare('rre',$this->rre,true);
		$criteria->compare('notseen',$this->notseen);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('surgeon',$this->surgeon);
		$criteria->compare('eye',$this->eye,true);
		$criteria->compare('anaesthesia',$this->anaesthesia);
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
	 * @return EOpdDetailed the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
