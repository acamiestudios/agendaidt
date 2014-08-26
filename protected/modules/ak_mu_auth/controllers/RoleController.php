<?php
class RoleController extends Controller{
    /**
     * @var integer the item type (0=operation, 1=task, 2=role).
     */
    public $type ;
    
    public function actionIndex(){
        $this->redirect( array('/ak_mu_auth/role/admin') );
    }
    
    public function actionAdmin(){
        $dataProvider = new AuthItemDataProvider();
        $dataProvider->type = 2;

        $this->render('admin',array(
                'dataProvider' => $dataProvider,
            )
        );
    }
}
?>
