<?php
class ConfiguracionController extends Controller{
    public function filters()
    {
        return array(array('CrugeAccessControlFilter'));
    }
    
    public function actionIndex() {
        $model=$this->loadModel(1);
        if( isset($_POST['Configuracion']) ){
            $model->attributes=$_POST['Configuracion'];
            $model->save();
        }
        $this->render('index',array(
            'model'=>$model,
        ));
    }
    
    public function loadModel($id){
        $model=  Configuracion::model()->findByPk($id);
        if( $model == null ){
            throw new CHttpException(404, 'La página no existe.');
        }
        return $model;
    }
}
