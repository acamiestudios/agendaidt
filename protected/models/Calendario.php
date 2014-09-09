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
			array('iduser, title, start, end, descripcion, color, allDay, url', 'required'),
			array('iduser, allDay', 'numerical', 'integerOnly'=>true),
			array('title, descripcion, url', 'length', 'max'=>255),
			array('start, end, color', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCalendario, iduser, title, start, end, descripcion, color, allDay, url', 'safe', 'on'=>'search'),
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
			'iduser' => 'Iduser',
			'title' => 'Title',
			'start' => 'Start',
			'end' => 'End',
			'descripcion' => 'Descripcion',
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
                );
                
            }
            return $arrEvent;
        }
}
