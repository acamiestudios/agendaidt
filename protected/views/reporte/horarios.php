<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'
);
?>
<h2 class="text-center">Administrar Horarios</h2>
<p>
Opcionalmente puedes usar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) en el comienzo de cada campo de busqueda.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
		array('name'=>'idIdt','value'=>'Yii::app()->user->um->getFieldValue($data->idIdt,"nombres") . " " . Yii::app()->user->um->getFieldValue($data->idIdt,"apellidos")'),
		array('name'=>'idFicha','value'=>'$data->idFicha0->nombre . " (" . $data->idFicha0->codigo . ")"' ),
		array(
                    'name'=>'dia',
                    'value'=>'Util::getDia($data->dia)',
                    'filter'=>CHtml::dropDownList('Horario[dia]','',array(1=>'Lunes',2=>'Martes',3=>'Miércoles',4=>'Jueves',5=>'Viernes',6=>'Sábado',7=>'Domingo'),array('empty'=>'-Seleccione-')),
                    ),
		array('name'=>'idHora','value'=>'$data->idHora0->valor'),
	),
)); ?>
