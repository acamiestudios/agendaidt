<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	'Instructores'=>array('admin'),
	$model->idInstructor,
);
?>
<h2 class="text-center">Ver IDT id #<?php echo $model->idInstructor; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->theme->baseUrl . '/css/bootstrap.min.css',
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'idInstructor',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
	),
)); ?>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?></div>
