<?php
$this->breadcrumbs=array(
    'Desercion'
);
?>
<h2 class="text-center">Alerta de aprendices por deserción</h2>
<p>
Opcionalmente puedes usar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) en el comienzo de cada campo de busqueda.
</p>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'User-grid',
	'dataProvider'=>$model->buscarDeserciones(),
	'filter'=>$model,
        'enableSorting'=>false,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
            array('name'=>'idFicha','value'=>'$data->idFicha0->nombre'),
            array('name'=>'cedula','value'=>'$data->idAprendiz0->cedula'),
            array('name'=>'primer_nombre','value'=>'$data->idAprendiz0->primer_nombre'),
            array('name'=>'segundo_nombre','value'=>'$data->idAprendiz0->segundo_nombre'),
            array('name'=>'primer_apellido','value'=>'$data->idAprendiz0->primer_apellido'),
            array('name'=>'segundo_apellido','value'=>'$data->idAprendiz0->segundo_apellido'),
            array('name'=>'inasistencias','filter'=>false),
            )
        )
    );