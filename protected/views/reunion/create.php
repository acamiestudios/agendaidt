<?php
/* @var $this ReunionController */
/* @var $model Reunion */

$this->breadcrumbs=array(
	'Reuniones'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear Reunión</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>