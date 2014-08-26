<?php
/* @var $this ReunionController */
/* @var $model Reunion */

$this->breadcrumbs=array(
	'Reuniones'=>array('index'),
	$model->idReunion=>array('view','id'=>$model->idReunion),
	'Editar',
);
?>


<h2 class="text-center">Editar Reunión id <?php echo $model->idReunion; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>