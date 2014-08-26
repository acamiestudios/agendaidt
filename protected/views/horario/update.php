<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->idHorario=>array('view','id'=>$model->idHorario),
	'Editar',
);
?>


<h2 class="text-center">Editar Horario id <?php echo $model->idHorario; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>