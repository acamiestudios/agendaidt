<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('admin'),
	$model->idHorario,
);
?>
<h2 class="text-center">Ver Horario id #<?php echo $model->idHorario; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->theme->baseUrl . '/css/bootstrap.min.css',
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		array('name'=>'idInstructor','value'=>Instructor::getNombreCompletoId($model->idInstructor)),
		'dia',
		'hora_ini',
		'hora_fin',
		array('name'=>'idFicha','value'=>$model->idFicha0->nombre),
	),
)); ?>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?></div>
