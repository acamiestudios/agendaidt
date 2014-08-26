<?php

class IdtController extends Controller{
    public function filters(){
        return array(array('CrugeAccessControlFilter'));
    }
    
    public function actionCreate(){
        $model = new Idt;
        $model->isNewRecord = 1;
        if(isset($_POST['Idt'])){
            $model->attributes=$_POST['Idt'];
           
            if($model->validate()){
                $values=array(
                    'username'=>$model->username,
                    'password'=>$model->password,
                    'email'=>$model->email,
                    'nombres'=>$model->nombres,
                    'apellidos'=>$model->apellidos,
                    'state'=>$model->state,
                );
                if( Yii::app()->user->um->createNewUser($values,'Instructor') ){
                    $this->redirect(array('admin'));
                }
            }
            
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }
    
    public function actionAdmin(){
        $model = Yii::app()->user->um->getSearchModelICrugeStoredUser();
        $model->unsetAttributes();
        if( isset($_GET[CrugeUtil::config()->postNameMappings['CrugeStoredUser']]) ) {
            $model->attributes = $_GET[CrugeUtil::config()->postNameMappings['CrugeStoredUser']];
        }
        $dataProvider = $model->searchByAuthItem('Instructor');
        $this->render("admin", array('model' => $model, 'dataProvider' => $dataProvider));
    }
    
    public function actionView($id){
        $model=Yii::app()->user->um->loadUserById($id); 
        Yii::app()->user->um->loadUserFields($model);
        $this->render('view',array(
                'model'=>$model,
        ));
    }
    
    public function actionUpdate($id){
        $user=Yii::app()->user->um->loadUserById($id,true);
        Yii::app()->user->um->loadUserFields($user);
        if( $user !== null ){
            $model=new Idt;
            
            $model->iduser = $user->iduser;
            $model->username = $user->username;
            $model->email = $user->email;
            $model->state = $user->state;
            $model->nombres=Yii::app()->user->um->getFieldValue($user,'nombres');
            $model->apellidos=Yii::app()->user->um->getFieldValue($user,'apellidos');
        }
        if( isset($_POST['Idt']) ){
            $model->unsetAttributes();
            $model->attributes = $_POST['Idt'];
            $model->password = $_POST['Idt']['password'];
            if( $model->validate() ){
                $user->username=$model->username;
                $model->password=trim($model->password);
                if($model->password != ''){
                    $user->password=$model->password;
                    $newPwd = trim($user->password);
                    Yii::log("deteccion de nueva clave: newPassword: [" . $newPwd . "]", "info");
                    if ($newPwd != '') {
                        Yii::log("\n\n***NUEVA CLAVE***\n\n", "info");
//                        echo 'ps:'.$newPwd.'-';exit;
                        Yii::app()->user->um->changePassword($user, $newPwd);
                    }
                }
                $user->email=$model->email;
                $user->state=$model->state;
               
                if( $user->validate() ){
                    
                    if (Yii::app()->user->um->save($user, 'update')) {
                        $fieldNombres = Yii::app()->user->um->getFieldValueInstance($user,'nombres');
                        $fieldNombres->value = $model->nombres;
                        $fieldNombres->save();
                        $fieldApellidos = Yii::app()->user->um->getFieldValueInstance($user,'apellidos');
                        $fieldApellidos->value = $model->apellidos;
                        $fieldApellidos->save();
                        $this->redirect(array('/idt/view/'.$id) );
                    }
                }
            }
        }
        $this->render('update',array(
                'model'=>$model,
        ));
    }
    
    public function actionDelete($id){
        $model = Yii::app()->user->um->loadUserById($id)->delete();
        if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}

