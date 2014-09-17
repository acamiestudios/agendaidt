<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $idHorario
 * @property integer $idHora
 * @property integer $dia
 * @property integer $idFicha
 * @property integer $idIdt
 *
 * The followings are the available model relations:
 * @property Hora $idHora0
 * @property Ficha $idFicha0
 * @property CrugeUser $idIdt0
 */
class Horario extends CActiveRecord
{
        public $nombreCompleto;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idHora, dia, idFicha, idIdt', 'required'),
			array('idHora, dia, idFicha, idIdt', 'numerical', 'integerOnly'=>true),
                        array('nombreCompleto','length','max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorario, idHora, dia, idFicha, idIdt, nombreCompleto', 'safe', 'on'=>'search'),
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
			'idHora0' => array(self::BELONGS_TO, 'Hora', 'idHora'),
			'idFicha0' => array(self::BELONGS_TO, 'Ficha', 'idFicha'),
			'idIdt0' => array(self::BELONGS_TO, 'CrugeUser', 'idIdt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHorario' => 'Id Horario',
			'idHora' => 'Hora',
			'dia' => 'Día',
			'idFicha' => 'Ficha',
			'idIdt' => 'IDT',
                        'nombreCompleto' => 'Nombre',
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

		$criteria->compare('idHorario',$this->idHorario);
		$criteria->compare('idHora0.valor',$this->idHora,true);
		$criteria->compare('t.dia',$this->dia);
		$criteria->compare('idFicha0.nombre',$this->idFicha,true);
		$criteria->compare('t3.value',$this->idIdt,true);
                $criteria->with=array('idHora0','idFicha0');
                $criteria->join = 'JOIN cruge_authassignment as t2 ON t2.userid = t.idIdt ';
                $criteria->join .='JOIN cruge_fieldvalue as t3 ON t3.iduser = t.idIdt';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function search2array()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idHorario',$this->idHorario);
		$criteria->compare('idHora0.valor',$this->idHora,true);
		$criteria->compare('t.dia',$this->dia);
		$criteria->compare('idFicha0.nombre',$this->idFicha,true);
		$criteria->compare('t3.value',$this->idIdt,true);
                $criteria->with=array('idHora0','idFicha0');
                $criteria->join = 'JOIN cruge_authassignment as t2 ON t2.userid = t.idIdt ';
                $criteria->join .='JOIN cruge_fieldvalue as t3 ON t3.iduser = t.idIdt';
		return Horario::model()->findAll($criteria);
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
}
