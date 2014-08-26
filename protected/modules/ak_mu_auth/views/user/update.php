<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->idUser),
	'Editar',
);
?>


<h2 class="text-center">Editar User id <?php echo $model->idUser; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>