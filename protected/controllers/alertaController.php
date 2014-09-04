<?php
class alertaController extends Controller{
    public function filters(){
        return array(array('CrugeAccessControlFilter'));
    }
    
    /**
     * @brief acción utilizada para mostrar las alertas de deserción de los alumnos
     */
    public function actionDesercion(){
        
        foreach($aprendices as $aprendiz){
            echo $aprendiz->idAprendiz0->primer_nombre. ' faltas:' . $aprendiz->inasistencias .'<br>';
        }
    }
}