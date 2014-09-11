<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Calendario'=>array('admin'),
	'Editar',
);
?>


<h2 class="text-center">Editar Evento <?php echo $model->title; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>