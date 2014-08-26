<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Aprendices'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear Aprendiz</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>