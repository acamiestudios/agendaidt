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
		array('name'=>'idIdt','value'=>Yii::app()->user->um->getFieldValue($model->idIdt,"nombres") . " " . Yii::app()->user->um->getFieldValue($model->idIdt,"apellidos")),
		array('name'=>'idFicha','value'=>$model->idFicha0->nombre),
		array('name'=>'dia','value'=>Util::getDia($model->dia)),
		array('name'=>'idHora','value'=>$model->idHora0->valor),
	),
)); ?>

<div class="text-center">
    <?php echo CHtml::link('Atras', array('admin'), array('class' => 'btn btn-danger') ); ?></div>
