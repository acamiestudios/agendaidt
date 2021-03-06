<?php

class IdtController extends Controller{
    public function filters(){
        return array(array('CrugeAccessControlFilter'));
    }
    
    public function actionCreate(){
        $model = new User;
        
        if(isset($_POST['User'])){
            $model->attributes=$_POST['User'];
            if($model->validate()){
                $role ='role_Idt';
                // asi se crea un usuario (una nueva instancia en memoria volatil)
                $usuarioNuevo = Yii::app()->user->um->createBlankUser();
                $usuarioNuevo->attributes = $model->attributes;
                if( $model->state == 1 ){
                    // la establece como "Activada"
                    Yii::app()->user->um->activateAccount($usuarioNuevo);
                }
                // verifica para no duplicar
                if(Yii::app()->user->um->loadUserByUsername($usuarioNuevo->username) != null)
                {
                    $message = $usuarioNuevo->username . ' ya existe.';
                    $model->addError('username', $message);
                    
                }
                // verifica para no duplicar
                foreach(Yii::app()->user->um->listUsers() as $user){
                    if( $user->email == $usuarioNuevo->email){
                        $message = $usuarioNuevo->email . ' ya existe.';
                        $model->addError('email', $message);
                    }
                }
                // ahora a ponerle una clave
                Yii::app()->user->um->changePassword( $usuarioNuevo, $usuarioNuevo->password );

                if( !$model->hasErrors() ){
                    // guarda usando el API. No pasa por filtros. se reparara a futuro.
                    if (Yii::app()->user->um->save($usuarioNuevo)) {

                        // le asigna un rol por defecto
                        if (Yii::app()->user->rbac->getAuthItem($role) != null) {
                            Yii::log(
                                __METHOD__ . "\n asignando role: " . $role . " a userid:"
                                    . $usuarioNuevo->getPrimaryKey(),
                                "info"
                            );
                            Yii::app()->user->rbac->assign($role, $usuarioNuevo->getPrimaryKey());
                        }

                            // campo personalizado: nombres
                            $fvNombres = Yii::app()->user->um->getFieldValueInstance($usuarioNuevo,'nombres');
                            if ($fvNombres != null) {
                                // evita una excepcion si se indica un nombre
                                // de campo personalizado inexistente.
                                //
                                $fvNombres->value = $model->nombres;
                                $fvNombres->update();
                            }

                            // campo personalizado: apellidos
                            $fvApellidos = Yii::app()->user->um->getFieldValueInstance($usuarioNuevo,'apellidos');
                            if ($fvApellidos != null) {
                                // evita una excepcion si se indica un nombre
                                // de campo personalizado inexistente.
                                //
                                $fvApellidos->value = $model->apellidos;
                                $fvApellidos->update();
                            }
                            $this->redirect(array('admin'));
                    } else {
                        // un error de validacion. emitido por alguna regla de
                        // cruge.models.data.CrugeStoredUser
                        //
                        $errores = CHtml::errorSummary($usuarioNuevo);
                        throw new CrugeException("no se pudo crear el usuario: " . $errores);
                    }
                }
            }
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }
    
    public function actionAdmin(){
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
                $model->attributes=$_GET['User'];

        $this->render('admin',array(
                'model'=>$model,
        ));
    }
    
    public function actionView($id){
        $model=Yii::app()->user->um->loadUserById($id); 
        Yii::app()->user->um->loadUserFields($model);
        $this->render('view',array(
                'model'=>$model,
        ));
    }
    
    public function actionUpdate($id){
        $model = User::model()->findByPk($id);
        $model->nombres=Yii::app()->user->um->getFieldValue($model->iduser,'nombres');
        $model->apellidos=Yii::app()->user->um->getFieldValue($model->iduser,'apellidos');
        
        if( isset($_POST['User']) ){
            $model->username = $_POST['User']['username'];
            $model->email = $_POST['User']['email'];
            $model->state = $_POST['User']['state'];
            $model->nombres = $_POST['User']['nombres'];
            $model->apellidos = $_POST['User']['apellidos'];
            if( $_POST['User']['password'] != '' ){
                $model->password = sha1($_POST['User']['password']);
            }
            
            if( $model->save() ){
                $fieldNombres = Yii::app()->user->um->getFieldValueInstance($model->iduser,'nombres');
                $fieldNombres->value = $model->nombres;
                $fieldNombres->save();
                $fieldApellidos = Yii::app()->user->um->getFieldValueInstance($model->iduser,'apellidos');
                $fieldApellidos->value = $model->apellidos;
                $fieldApellidos->save();
                $this->redirect(array('/idt/view/'.$id) );
            }
        }
        
        $model->password = '';
        $this->render('update',array(
                'model'=>$model,
        ));
    }
    
    public function actionDelete($id){
        try{
            if( Yii::app()->user->checkAccess('role_Coordinador') ){
                $model = Yii::app()->user->um->loadUserById($id)->delete();
                if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        }catch(CDbException $e){
            if($e->getCode() == '23000' ){
                header('HTTP/1.0 400');
                echo "No se puede eliminar el IDT por que afectaría otra información.";
            }else{
                throw $e;
            }
        }
    }
}

