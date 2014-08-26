<?php

class InstructorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//@@@public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(array('CrugeAccessControlFilter'));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Idt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Instructor']))
		{
			$model->attributes=$_POST['Instructor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idInstructor));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            
		$model=Yii::app()->user->um->loadUserById($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
//                foreach($model as $m){
//                    print_r($model->iduser);
//                }
//                exit;
		if(isset($_POST['Instructor']))
		{
			$model->attributes=$_POST['Instructor'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->iduser));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Administrar todos los registros.
	 */
	public function actionAdmin()
	{
            $model = Yii::app()->user->um->getSearchModelICrugeStoredUser();
            $model->unsetAttributes();
            if (isset($_GET[CrugeUtil::config()->postNameMappings['CrugeStoredUser']])) {
                $model->attributes = $_GET[CrugeUtil::config()->postNameMappings['CrugeStoredUser']];
            }
            $dataProvider = $model->search();
            $this->render("admin", array('model' => $model, 'dataProvider' => $dataProvider));
		
            /*$model=new Instructor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Instructor']))
			$model->attributes=$_GET['Instructor'];

		$this->render('admin',array(
			'model'=>$model,
		));*/
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Instructor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Instructor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Instructor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='instructor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
