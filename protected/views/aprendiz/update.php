<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Aprendices'=>array('admin'),
	$model->idAprendiz=>array('view','id'=>$model->idAprendiz),
	'Editar',
);
?>


<h2 class="text-center">Editar Aprendiz id <?php echo $model->idAprendiz; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>