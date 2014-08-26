<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear Horario</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>