<?php

/**
 * This is the model class for table "cruge_user".
 *
 * The followings are the available columns in table 'cruge_user':
 * @property integer $iduser
 * @property string $regdate
 * @property string $actdate
 * @property string $logondate
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authkey
 * @property integer $state
 * @property integer $totalsessioncounter
 * @property integer $currentsessioncounter
 *
 * The followings are the available model relations:
 * @property CrugeAuthitem[] $crugeAuthitems
 * @property CrugeFieldvalue[] $crugeFieldvalues
 */
class User extends CActiveRecord
{
    public $idFicha;
    public $nombres;
    public $apellidos;
    public $nombreCompleto;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cruge_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('username,email','unique'),
                        array('username,email,nombres,apellidos,state', 'required'),
			array('iduser,state, totalsessioncounter, currentsessioncounter', 'numerical', 'integerOnly'=>true),
			array('regdate, actdate, logondate', 'length', 'max'=>30),
			array('username, password, nombreCompleto', 'length', 'max'=>64),
                        array('username', 'checkSpace'),
			array('nombres,apellidos', 'length', 'max'=>45),
                        array('email','length','min'=>6),
                        array('email','email'),
			array('authkey', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser, idFicha nombres, apellidos, nombreCompleto, regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter', 'safe', 'on'=>'search'),
		);
	}

        public function checkSpace($attribute){
            if( preg_match('/\s/',$this->$attribute) ){
                $message = Yii::t('yii', '{attribute} no debe contener espacios.', array('{attribute}'=>$this->getAttributeLabel($attribute)));
                $this->addError($attribute, $message);
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
			'crugeAuthitems' => array(self::MANY_MANY, 'CrugeAuthitem', 'cruge_authassignment(userid, itemname)'),
			'crugeFieldvalues' => array(self::HAS_MANY, 'CrugeFieldvalue', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                        'iduser' => 'iduser',
                        'idFicha'=>'Fichas',
			'username' => 'Usuario',
                        'password'=>'Contraseña',
                        'email' => 'Email',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
                        'nombreCompleto' => 'Nombre',
			'state' => 'Se puede logear',
			'regdate' => 'Regdate',
			'actdate' => 'Actdate',
			'logondate' => 'Logondate',
			'authkey' => 'Authkey',
			'totalsessioncounter' => 'Totalsessioncounter',
			'currentsessioncounter' => 'Currentsessioncounter',
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
                $criteria->distinct = true;
		$criteria->compare('t.iduser',$this->iduser);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.state',$this->state);
		$criteria->compare('t2.itemname','role_Idt');
                $criteria->compare('t3.value',$this->nombreCompleto,true);
                $criteria->compare('t5.nombre',$this->idFicha,true);
                $criteria->join = 'JOIN cruge_authassignment as t2 ON t2.userid = t.iduser ';
                $criteria->join .= 'JOIN cruge_fieldvalue as t3 ON t3.iduser = t.iduser ';
                $criteria->join .= 'JOIN horario as t4 ON t4.idIdt=t.iduser ';
                $criteria->join .= 'JOIN ficha as t5 ON t5.idFicha=t4.idFicha ';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->distinct = true;
		$criteria->compare('t.iduser',$this->iduser);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.state',$this->state);
		$criteria->compare('t2.itemname','role_Idt');
                $criteria->compare('t3.value',$this->nombreCompleto,true);
                $criteria->compare('t5.nombre',$this->idFicha,true);
                $criteria->join = 'JOIN cruge_authassignment as t2 ON t2.userid = t.iduser ';
                $criteria->join .= 'JOIN cruge_fieldvalue as t3 ON t3.iduser = t.iduser ';
                $criteria->join .= 'JOIN horario as t4 ON t4.idIdt=t.iduser ';
                $criteria->join .= 'JOIN ficha as t5 ON t5.idFicha=t4.idFicha ';
		return User::model()->findAll($criteria);
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getNombresApellidos($id){
            return Yii::app()->user->um->getFieldValue($id,'nombres') . ' ' . Yii::app()->user->um->getFieldValue($id,'apellidos');
        }
        
        public function getFichas($id) {
            $fichas=  Horario::model()->findAllByAttributes(array('idIdt'=>$id));
            if( $fichas ){
                foreach ($fichas as $ficha) {
                    $arrFichas[]=$ficha->idFicha0->nombre;
                }
                return implode(', ',$arrFichas);
            }else{
                return false;
            }
            
            
        }
        
       
}
