<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Calendario'=>array('index'),
	'Crear evento',
);
?>

<h2 class="text-center">Crear Evento.</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>