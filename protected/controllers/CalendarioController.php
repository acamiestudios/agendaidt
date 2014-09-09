<?php

class CalendarioController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionCreate() {
        $model = new Calendario;
        if( isset($_POST['Calendario']) ){
            $model->attributes = $_POST['Calendario'];
            if( $model->save() ){
                $model = new Calendario;
            }
        }
        $this->render('create',array(
                'model'=>$model,
        ));
    }

}