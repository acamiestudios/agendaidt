<?php

class CalendarioController extends Controller
{
    public function filters()
    {
        return array(array('CrugeAccessControlFilter'));
    }
        
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionCreate() {
        if( Yii::app()->user->checkAccess('role_Coordinador') ){
            $model = new Calendario;
            if( isset($_POST['Calendario']) ){
                $model->attributes = $_POST['Calendario'];
                $model->start = $_POST['Calendario']['fecha_ini'] . ' ' . $_POST['Calendario']['hora_ini'];
                if( $_POST['Calendario']['fecha_fin'] != '' && $_POST['Calendario']['hora_fin']!= '' ){
                    $model->end=$_POST['Calendario']['fecha_fin'] . ' ' . $_POST['Calendario']['hora_fin'];
                    $model->allDay=0;
                }else{
                    $model->end='';
                    $model->allDay=1;
                }
                if( $model->save() ){
                    $model->unsetAttributes();
                    $model = new Calendario;
                    Yii::app()->user->setFlash('mensaje','El evento "' . $_POST['Calendario']['title'] .  '" se creo con éxito.');
                    Yii::app()->user->setFlash('tipoAlerta','success');
                }


            }
            $this->render('create',array(
                    'model'=>$model,
            ));
        }
    }
    
    public function actionUpdate($id){
        $model=$this->loadModel($id);
        if($model){
            $start=explode(' ', $model->start);
            $model->fecha_ini=$start[0];
            $model->hora_ini=$start[1];
            
            if( $model->end !== '' ){
                $end=explode(' ', $model->end);
                $model->fecha_fin=$end[0];
                $model->hora_fin=$end[1];
            }
        }
        if(isset($_POST['Calendario'])){
                $model->attributes=$_POST['Calendario'];
                $model->start = $_POST['Calendario']['fecha_ini'] . ' ' . $_POST['Calendario']['hora_ini'];
                
                if( $_POST['Calendario']['fecha_fin'] != '' && $_POST['Calendario']['hora_fin']!= '' ){
                    $model->end=$_POST['Calendario']['fecha_fin'] . ' ' . $_POST['Calendario']['hora_fin'];
                    $model->allDay=0;
                }else{
                    $model->end='';
                    $model->allDay=1;
                }
                if($model->save())
                        $this->redirect(array('admin'));
        }

        $this->render('update',array(
                'model'=>$model,
        ));
    }
    
    public function actionAdmin(){
        $model=new Calendario('search');
        $model->unsetAttributes();
        if( isset($_GET['Calendario']) ){
            $model->attributes=$_GET['Calendario'];
        }
        $this->render('admin',array(
            'model'=>$model,
        ));
    }
    
    public function actionDelete($id){
        if( Yii::app()->user->checkAccess('role_Coordinador') ){
            try{
                $this->loadModel($id)->delete();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            } catch (CDbException $e) {
                if( $e->getCode() == '23000' ){
                    header('HTTP/1.0 400');
                    echo "No se puede eliminar el Evento por que afectaría otra información.";
                }else{
                    throw $e;
                }
            }
        }
    }
    
    public function loadModel($id){
        $model=Calendario::model()->findByPk($id);
        if( $model===null ){
            throw new CHttpException(404, 'La página no existe.');
        }
        return $model;
        
    }
}