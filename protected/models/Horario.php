<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $idHorario
 * @property string $hora_ini
 * @property string $hora_fin
 * @property string $dia
 * @property integer $idFicha
 * @property integer $idIdt
 *
 * The followings are the available model relations:
 * @property Ficha $idFicha0
 * @property Instructor $idIdt0
 */
class Horario extends CActiveRecord
{
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
			array('hora_ini, hora_fin, dia, idFicha, idIdt', 'required'),
			array('idFicha, idIdt', 'numerical', 'integerOnly'=>true),
			array('dia', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorario, hora_ini, hora_fin, dia, idFicha, idIdt', 'safe', 'on'=>'search'),
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
			'idIdt0' => array(self::BELONGS_TO, 'cruge_user', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHorario' => 'Id Horario',
			'hora_ini' => 'Hora Ini',
			'hora_fin' => 'Hora Fin',
			'dia' => 'Día',
			'idFicha' => 'Ficha',
			'idIdt' => 'IDT',
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
		$criteria->compare('hora_ini',$this->hora_ini,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('idFicha',$this->idFicha);
                $criteria->compare('idIdt',Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__){
            return parent::model($className);
        }

        protected function afterFind (){
            // convert to display format
            $this->hora_ini = date('H:i',strtotime($this->hora_ini));
            $this->hora_fin = date('H:i',strtotime($this->hora_fin));

            parent::afterFind ();
        }

        protected function beforeValidate (){
            // convert to storage format
            /*$this->createdon = strtotime ($this->createdon);
            $this->createdon = date ('Y-m-d', $this->createdon);

            return parent::beforeValidate ();*/
        }
        
}
