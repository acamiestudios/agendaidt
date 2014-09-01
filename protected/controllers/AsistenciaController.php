<?php

class AsistenciaController extends Controller
{
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            return array(array('CrugeAccessControlFilter'));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Asistencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idAsistencia));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Asistencia']))
		{
			$model->attributes=$_POST['Asistencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idAsistencia));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Redirige a la vista admin.
	 */
	public function actionIndex()
	{
            $horarios = Horario::model()->findAll('idIdt=:ididt', 
            array(':ididt'=>Yii::app()->user->id));
            foreach( $horarios as $horario ){
                $idFichas[]= $horario->idFicha;
                /*$ficha=Ficha::model()->findByPk($horario->idFicha);
                echo $ficha->nombre .'<br>';*/
            }
            $fichas=Ficha::model()->findAllByPk($idFichas);
            $dataFichas=CHtml::listData($fichas,'idFicha','nombre');

//            echo "<option value=''>Select City</option>";
//            foreach($data as $value=>$city_name)
//            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($city_name),true);
            $model= new Asistencia;
            $this->render('index',array(
                    'model'=>$model,
                'dataFichas'=>$dataFichas,
            ));
	}

	/**
	 * Administrar todos los registros.
	 */
	public function actionAdmin()
	{
		$model=new Asistencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Asistencia']))
			$model->attributes=$_GET['Asistencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Asistencia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Asistencia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Asistencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='asistencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionGetHoras(){
            if( isset($_POST['asistencia-form']) ){
                $idFicha=$_POST['asistencia-form']['idFicha'];
                $dia=date('N', strtotime($_POST['asistencia-form']['datepicker']));
                $idIdt=Yii::app()->user->id;
                $resultado=Horario::model()->findAllByAttributes(array('idFicha'=>$idFicha,'idIdt'=>$idIdt,'dia'=>$dia),array('select'=>'t.idHora,t.idHorario'));
                foreach( $resultado as $rdia ){
                    echo CHtml::tag('option',array('value'=> $rdia->idHorario),CHtml::encode($rdia->idHora0->valor),true);
                }
            }
        }
        
        public function actionGetAlumnos(){
            if( isset($_POST['asistencia-form']) ){
                $idFicha=$_POST['asistencia-form']['idFicha'];
                $fechaAsistencia=$_POST['asistencia-form']['datepicker'];
                $idHorario=$_POST['asistencia-form']['idHorario'];
                $dia=date('N', strtotime($fechaAsistencia));
                $idIdt=Yii::app()->user->id;
                $aprendices=  Aprendiz::model()->findAllByAttributes(array('idFicha'=>$idFicha));
                $this->renderPartial('_listaAprendices',array(
                                                'model'=>$aprendices,
                                                'fechaAsistencia'=>$_POST['asistencia-form']['datepicker'],
                                                'idFicha'=>$idFicha,
                                                'idHorario'=>$idHorario,
                                            ),false,true
                        );
            }
        }
        
        public function actionGuardarAsistencias(){
            if( isset($_POST['listaAprendices']) ){
                $idHorario=$_POST['listaAprendices']['idHorario'];
                $fechaAsistencia=$_POST['listaAprendices']['fechaAsistencia'];
                $arrAprendices=$_POST['listaAprendices']['asistio'];
                                
                foreach($arrAprendices as $key=>$aprendiz){
                    $asistenciaAprendiz=Asistencia::model()->findByAttributes(array('fechaAsistencia'=>$fechaAsistencia, 'idHorario'=>$idHorario, 'idAprendiz'=>$key));
                    if( $asistenciaAprendiz != null){
                        $asistenciaAprendiz->asistio = $aprendiz;
                        $asistenciaAprendiz->save();
                    }else{
                        $asistencia=new Asistencia;
                        $asistencia->idAprendiz=$key;
                        $asistencia->idHorario=$idHorario;
                        $asistencia->fechaAsistencia=$fechaAsistencia;
                        $asistencia->asistio=$aprendiz;
                        $asistencia->save();
                    }
                }
                Yii::app()->user->setFlash('success','Asistencias guardadas correctamente.');
                $model = new Asistencia;
               $this->redirect('index');
            }
        }
}
