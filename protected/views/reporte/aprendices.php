<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	"Aprendices",
);
$url=Yii::app()->createUrl('/reporte/exportarExcel/');

$scriptUrl = Yii::app()->request->scriptUrl;
Yii::app()->clientScript->registerScript('search', "
$('#btnExpExcel').click(function(event){
        event.preventDefault();
        var urlExport = 'http://localhost/agendaidt/reporte/exportarExcel';
        $('input,select').each(function(){
            if(this.value){
                var value = this.value;
                urlExport += this.name+'/'+value+'/';
            }
        });
        window.location = urlExport;
});
");
?>
<h2 class="text-center">Aprendices</h2>
<form metod="get" action="exportarExcelAprendiz">
<?php 
echo CHtml::linkButton('Excel <i class="glyphicon glyphicon-cloud-download"></i>',array('name'=>'btnExpExcel','type'=>'submit','class' => 'btn btn-info pull-left',)); 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'User-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
                'cedula',
                'primer_nombre',
                'segundo_nombre',
                'primer_apellido',
                'segundo_apellido',
                array('name'=>'idFicha','value'=>'$data->idFicha0->nombre'),
                
	),
)); 

?>
</form>


