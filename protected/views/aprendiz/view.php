<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Aprendices'=>array('admin'),
	$model->idAprendiz,
);
?>
<h2 class="text-center">Ver Aprendiz id #<?php echo $model->idAprendiz; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->theme->baseUrl . '/css/bootstrap.min.css',
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'idAprendiz',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		array('name'=>'idFicha','value'=>$model->rel_idFicha->nombre),
	),
)); ?>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?></div>
