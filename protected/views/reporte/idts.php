<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */

$this->breadcrumbs=array(
	"IDT'S",
);
$url=Yii::app()->createUrl('/reporte/exportarExcel/');

$scriptUrl = Yii::app()->request->scriptUrl;
Yii::app()->clientScript->registerScript('search', "
$('#btnExpExcel2').click(function(event){
        event.preventDefault();
        var urlExport = 'exportarExcelIdt/';
        $('input').each(function(){
            if(this.value){
                var value = this.value;
                urlExport += this.name+'/'+value+'/';
            }
        });
        
        //window.location = urlExport;
});
");
?>
<h2 class="text-center">IDT'S</h2>
<form metod="get" action="exportarExcelIdt">
<?php 
echo CHtml::linkButton('Excel <i class="glyphicon glyphicon-cloud-download"></i>',array('name'=>'btnExpExcel','type'=>'submit','class' => 'btn btn-info pull-left',)); 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'User-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
                array('name'=>'nombreCompleto','value'=>'User::getNombresApellidos($data->iduser)','id'=>'reporte_idts_nombreCompleto'),
                'email',
            array('name'=>'idFicha','value'=>'User::getFichas($data->iduser)'),
                
	),
)); 

?>
</form>


