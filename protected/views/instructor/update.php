<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->iduser=>array('view','id'=>$model->iduser),
	'Editar',
);
?>


<h2 class="text-center">Editar Instructor id <?php echo $model->iduser; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>