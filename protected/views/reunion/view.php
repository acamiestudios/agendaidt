<?php
/* @var $this ReunionController */
/* @var $model Reunion */

$this->breadcrumbs=array(
	'Reuniones'=>array('admin'),
	$model->idReunion,
);
?>
<h2 class="text-center">Ver Reunión id #<?php echo $model->idReunion; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->theme->baseUrl . '/css/bootstrap.min.css',
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'idReunion',
		'fecha',
		'hora_ini',
		'hora_fin',
		'descripcion',
	),
)); ?>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?></div>
