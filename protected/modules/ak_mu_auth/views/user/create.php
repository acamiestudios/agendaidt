<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear User</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>