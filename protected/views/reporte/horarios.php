<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'
);
$scriptUrl = Yii::app()->request->scriptUrl;
Yii::app()->clientScript->registerScript('search', "
$('#btnExpExcel').click(function(event){
        event.preventDefault();
        var urlExport = 'http://localhost/agendaidt/reporte/exportarExcelHorarios';
        $('input,select').each(function(){
            if(this.value){
                var value = this.value;
                urlExport += this.name+'/'+value+'/';
            }
        });
        window.location = urlExport;
});
");?>
<h2 class="text-center">Horarios</h2>
<form metod="get" action="exportarExcelHorarios">
<?php 
echo CHtml::linkButton('Excel <i class="glyphicon glyphicon-cloud-download"></i>',array('name'=>'btnExpExcel','type'=>'submit','class' => 'btn btn-info pull-left',)); 
$this->widget('zii.widgets.grid.CGridView', array(
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
</form>