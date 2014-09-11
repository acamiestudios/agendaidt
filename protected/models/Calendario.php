<?php

/**
 * This is the model class for table "calendario".
 *
 * The followings are the available columns in table 'calendario':
 * @property integer $idCalendario
 * @property integer $iduser
 * @property string $title
 * @property string $start
 * @property string $end
 * @property string $descripcion
 * @property string $color
 * @property integer $allDay
 * @property string $url
 *
 * The followings are the available model relations:
 * @property CrugeUser $iduser0
 */
class Calendario extends CActiveRecord
{
    public $fecha_ini;
    public $hora_ini;
    public $fecha_fin;
    public $hora_fin;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calendario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, start, fecha_ini, hora_ini', 'required'),
			array('iduser, allDay', 'numerical', 'integerOnly'=>true),
			array('title, descripcion, url', 'length', 'max'=>255),
			array('start, fecha_ini, hora_ini, fecha_fin, hora_fin, end, color', 'length', 'max'=>20),
                        array('start','compareFechas'),
//                        array('start','compare','compareAttribute'=>'end','operator'=>'<','message'=>'Fecha inicio debe ser menor a la fecha final.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCalendario, iduser, title, fecha_ini, hora_ini, fecha_fin, hora_fin, end, descripcion, color, allDay, url', 'safe', 'on'=>'search'),
		);
	}

        public function compareFechas($attribute){
            if( $this->end != '' ){
                if( $this->start >= $this->end ) {
                    $mensaje=Yii::t( 'yii','{attribute} debe ser menor a la fecha final.', array('{attribute}'=>$this->getAttributeLabel($attribute)) );
                    $this->addError($attribute, $mensaje);
                }
            }
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'iduser0' => array(self::BELONGS_TO, 'CrugeUser', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCalendario' => 'Id Calendario',
			'iduser' => 'Usuario',
			'title' => 'Título',
			'start' => 'Fecha Inicio',
                        'fecha_ini'=>'Fecha inicio',
                        'hora_ini'=>'Hora inicio',
			'end' => 'Fecha fin',
                        'fecha_fin'=>'Fecha fin',
                        'hora_fin'=>'Hora Fin',
			'descripcion' => 'Descripción',
			'color' => 'Color',
			'allDay' => 'All Day',
			'url' => 'Url',
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

		$criteria->compare('idCalendario',$this->idCalendario);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('allDay',$this->allDay);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Calendario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getEventos() {
            $eventos = Calendario::model()->findAll();
            $arrEvent = array();
            foreach ($eventos as $evento) {
                $arrEvent[]=array(
                    'title'=>$evento->title,
                    'descripcion'=>$evento->descripcion,
                    'start'=>$evento->start,
                    'fecha_ini'=>$evento->start,
                    'end'=>$evento->end,
                    'fecha_fin'=>$evento->end,
                    'allDay'=>($evento->allDay) ? true : false ,
                    'editable'=>($evento->editable) ? true : false ,
                );
                
            }
            return $arrEvent;
        }
}
