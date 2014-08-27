<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	'Aprendices'=>array('admin'),
	$model->idAprendiz,
);
?>
<h2 class="text-center">Ver Aprendiz <?php echo $model->primer_nombre . ' ' . $model->primer_apellido; ?></h2>
<div class="col-md-offset-2 col-md-8">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' => Yii::app()->theme->baseUrl . '/css/bootstrap.min.css',
	'htmlOptions' => array('class' => 'table table-hover'),
	'attributes'=>array(
		'cedula',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		array('name'=>'idFicha','value'=>$model->idFicha0->nombre),
	),
)); ?>
<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?>
</div>
</div>
