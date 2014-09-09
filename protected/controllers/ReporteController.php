<?php

class ReporteController extends Controller {

    public function filters() {
        return array(array('CrugeAccessControlFilter'));
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
    
    public function actionExportarExcel() {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
                $model->attributes=$_GET['User'];
        $this->layout='none';
        Yii::app()->request->sendFile("idts".date("YmdHis").".xls",
			$this->renderPartial("_exportarExcel",array(
						"model"=>$model
			),true)
		);
        
    }
}
