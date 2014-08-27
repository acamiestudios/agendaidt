<?php

/**
 * This is the model class for table "aprendiz".
 *
 * The followings are the available columns in table 'aprendiz':
 * @property integer $idAprendiz
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property integer $idFicha
 *
 * The followings are the available model relations:
 * @property Ficha $idFicha0
 * @property Inasistencia[] $inasistencias
 * @property Instructor-aprendiz[] $instructor-aprendizs
 */
class Aprendiz extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aprendiz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('primer_nombre, primer_apellido, idFicha', 'required'),
			array('idFicha', 'numerical', 'integerOnly'=>true),
			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAprendiz, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, idFicha', 'safe', 'on'=>'search'),
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
			'rel_idFicha' => array(self::BELONGS_TO, 'Ficha', 'idFicha'),
			'inasistencias' => array(self::HAS_MANY, 'Inasistencia', 'idAprendiz'),
			'instructor-aprendizs' => array(self::HAS_MANY, 'Instructor-aprendiz', 'idAprendiz'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAprendiz' => 'Id Aprendiz',
			'primer_nombre' => 'Primer Nombre',
			'segundo_nombre' => 'Segundo Nombre',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'idFicha' => 'Ficha',
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

		$criteria->compare('idAprendiz',$this->idAprendiz);
		$criteria->compare('primer_nombre',$this->primer_nombre,true);
		$criteria->compare('segundo_nombre',$this->segundo_nombre,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('rel_idFicha.nombre',$this->idFicha,true);
                $criteria->with=array('rel_idFicha');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aprendiz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
