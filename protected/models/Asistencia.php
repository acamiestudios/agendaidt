<?php

/**
 * This is the model class for table "asistencia".
 *
 * The followings are the available columns in table 'asistencia':
 * @property integer $idAsistencia
 * @property integer $idAprendiz
 * @property integer $idHorario
 * @property string $fechaAsistencia
 * @property integer $asistio
 *
 * The followings are the available model relations:
 * @property Horario $idHorario0
 * @property Aprendiz $idAprendiz0
 */
class Asistencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asistencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAprendiz, idHorario, fechaAsistencia, asistio', 'required'),
			array('idAprendiz, idHorario, asistio', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAsistencia, idAprendiz, idHorario, fechaAsistencia, asistio', 'safe', 'on'=>'search'),
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
			'idHorario0' => array(self::BELONGS_TO, 'Horario', 'idHorario'),
			'idAprendiz0' => array(self::BELONGS_TO, 'Aprendiz', 'idAprendiz'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAsistencia' => 'Id Asistencia',
			'idAprendiz' => 'Id Aprendiz',
			'idHorario' => 'Id Horario',
			'fechaAsistencia' => 'Fecha Asistencia',
			'asistio' => 'Asistio',
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

		$criteria->compare('idAsistencia',$this->idAsistencia);
		$criteria->compare('idAprendiz',$this->idAprendiz);
		$criteria->compare('idHorario',$this->idHorario);
		$criteria->compare('fechaAsistencia',$this->fechaAsistencia,true);
		$criteria->compare('asistio',$this->asistio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asistencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
