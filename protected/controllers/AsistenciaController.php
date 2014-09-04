<?php

class AsistenciaController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters(){
            return array(array('CrugeAccessControlFilter'));
	}

        public function actionDesercion() {
            $model=new Asistencia('search');
            $model->unsetAttributes();
            if ( isset($_GET['Asistencia']) ) {
                $model->attributes=$_GET['Asistencia'];
            }
            $this->render('desercion',array(
                    'model'=>$model,
                ));
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
                $idFicha=$_POST['listaAprendices']['idFicha'];
                                
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
                        $asistencia->idFicha=$idFicha;
                        $asistencia->save();
                    }
                }
                Yii::app()->user->setFlash('success','Asistencias guardadas correctamente.');
                $model = new Asistencia;
               $this->redirect('index');
            }
        }
}
