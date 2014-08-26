<?php
/* @var $this FichaController */
/* @var $model Ficha */

$this->breadcrumbs=array(
	'Fichas'=>array('index'),
	$model->idFicha=>array('view','id'=>$model->idFicha),
	'Editar',
);
?>


<h2 class="text-center">Editar Ficha id <?php echo $model->idFicha; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>