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
 * @property integer $idFicha
 *
 * The followings are the available model relations:
 * @property Ficha $idFicha0
 * @property Aprendiz $idAprendiz0
 * @property Horario $idHorario0
 */
class Asistencia extends CActiveRecord
{
    public $inasistencias;
    public $cedula;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    
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
			array('idAprendiz, idHorario, fechaAsistencia, asistio, idFicha', 'required'),
			array('idAprendiz, idHorario, asistio, idFicha', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAsistencia, idAprendiz, cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, idHorario, fechaAsistencia, asistio, idFicha', 'safe', 'on'=>'search'),
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
			'idFicha0' => array(self::BELONGS_TO, 'Ficha', 'idFicha'),
			'idAprendiz0' => array(self::BELONGS_TO, 'Aprendiz', 'idAprendiz'),
			'idHorario0' => array(self::BELONGS_TO, 'Horario', 'idHorario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
            return array(
                'idAsistencia' => 'Id Asistencia',
                'idAprendiz' => 'Id Aprendiz',
                'idHorario' => 'Id Horario',
                'fechaAsistencia' => 'Fecha Asistencia',
                'asistio' => 'Asistio',
                'idFicha' => 'Ficha',
                'inasistencias'=>'Inasistencias',
                'cedula' => 'Cédula',
                'primer_nombre'=>'Primer nombre',
                'segundo_nombre'=>'Segundo nombre',
                'primer_apellido'=>'Primer apellido',
                'Segundo_apellido'=>'Segundo apellido',
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
		$criteria->compare('idFicha',$this->idFicha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function buscarDeserciones() {
            $alertaNumFaltas=  Configuracion::model()->findByPk(1);
            $criteria = new CDbCriteria;
            $criteria->select="t.idFicha,t.idAprendiz,sum(asistio) as inasistencias";
            $criteria->order='inasistencias DESC';
            $criteria->group="t.idAprendiz";
            $criteria->compare('idFicha0.nombre',$this->idFicha,true);
            $criteria->compare('idAprendiz0.cedula',$this->cedula);
            $criteria->compare('idAprendiz0.primer_nombre',$this->primer_nombre,true);
            $criteria->compare('idAprendiz0.segundo_nombre',$this->segundo_nombre,true);
            $criteria->compare('idAprendiz0.primer_apellido',$this->primer_apellido,true);
            $criteria->compare('idAprendiz0.segundo_apellido',$this->segundo_apellido,true);
            $criteria->with=array('idAprendiz0','idFicha0');
            $criteria->having='sum(asistio) >= ' . $alertaNumFaltas->alertaInasistencias;
//            $criteria->together = true;
            
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
