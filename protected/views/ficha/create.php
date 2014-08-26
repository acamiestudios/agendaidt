<?php
/* @var $this FichaController */
/* @var $model Ficha */

$this->breadcrumbs=array(
	'Fichas'=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear Ficha</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>