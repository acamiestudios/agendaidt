<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Roles'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear Rol</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>