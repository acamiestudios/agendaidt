<?php

class ReporteController extends Controller {

    public function filters() {
//        return array(array('CrugeAccessControlFilter'));
    }
    
    public function actionIdts() {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User'])){
            $model->attributes=$_GET['User'];
        }
        $this->render('idts',array(
                'model'=>$model,
        ));
    }
    
    public function actionAprendices(){
        $model=new Aprendiz('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Aprendiz'])){
            $model->attributes=$_GET['Aprendiz'];
        }
        $this->render('aprendices',array(
                'model'=>$model,
        ));
    }
    
    public function actionHorarios(){
        $model=new Horario('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Horario']))
                $model->attributes=$_GET['Horario'];

        $this->render('horarios',array(
                'model'=>$model,
        )); 
    }
    
    public function actionAgenda(){
        $this->render('agenda',array(
            'model'=>$model,
        ));
    }
    
    public function actionExportarExcelIdt() {
        if( isset($_GET['User']) ){
            $idts = new User;
            $idts->unsetAttributes();  // clear any default values
            if( isset($_GET['User']['nombreCompleto']) && $_GET['User']['nombreCompleto'] != '' ){
                $idts->nombreCompleto=$_GET['User']['nombreCompleto'];
            }
            if( isset($_GET['User']['email']) && $_GET['User']['email'] != '' ){
                $idts->email=$_GET['User']['email'];
            }
            if( isset($_GET['User']['idFicha']) && $_GET['User']['idFicha'] != '' ){
                $idts->idFicha=$_GET['User']['idFicha'];
            }

            $model=$idts->search2();
            $this->layout='none';
            Yii::app()->request->sendFile("idts" . date("YmdHis") . ".xls",
                            $this->renderPartial("_exportarExcelIdt",array(
                                                    "model"=>$model
                            ),true)
                    );
        }
    }
    
    public function actionExportarExcelAprendiz() {
        if( isset($_GET['Aprendiz']) ){
            $buscar = new Aprendiz;
            $buscar->unsetAttributes();
            $buscar->attributes=$_GET['Aprendiz'];
            $model=$buscar->search2();
            $this->layout='none';
            Yii::app()->request->sendFile("aprendices" . date("YmdHis") . ".xls",
                            $this->renderPartial("_exportarExcelAprendices",array(
                                                    "model"=>$model
                            ),true)
                    );
        }
        
    }
    
    public function actionExportarExcelHorarios() {
        if( isset($_GET['Horario']) ){
            $buscar = new Horario;
            $buscar->unsetAttributes();
            $buscar->attributes=$_GET['Horario'];
            $model=$buscar->search2array();
            $this->layout='none';
            Yii::app()->request->sendFile("horario" . date("YmdHis") . ".xls",
                            $this->renderPartial("_exportarExcelHorarios",array(
                                                    "model"=>$model
                            ),true)
                    );
        }
        
    }
}
