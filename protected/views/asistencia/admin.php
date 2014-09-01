<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('admin'),
	'Administrar',
);
?>
<h2 class="text-center">Administrar Asistencias</h2>
<?php echo CHtml::link('Nuevo <i class="glyphicon glyphicon-plus"></i>',array('create'),array('class' => 'btn btn-success pull-right')); ?><p>
Opcionalmente puedes usar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) en el comienzo de cada campo de busqueda.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'asistencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
		array('name'=>'idAprendiz','value'=>'$data->idAprendiz0->nombre'),
		array('name'=>'idHorario','value'=>'$data->idHorario0->idHora'),
		'fechaAsistencia',
		array('name'=>'asistio','value'=>'($data->asistio == 1) ? Si : No'),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
            'header' => 'Acción',
            'buttons' => array(
                            'view' => array(
                                'label' => '<i class="glyphicon glyphicon-eye-open"></i>',
                                'imageUrl'=>false,  //Image URL of the button.
                                'options'=>array('title' => 'Ver registro.', 'class' => 'linkBacion'),
                                //'click'=>'',     //A JS function to be invoked when the button is clicked.
                                //'visible'=>'',   //A PHP expression for determining whether the button is visible.
                            ),
                            'update' => array(
                                'label' => '<i class="glyphicon glyphicon-pencil"></i>',     //Text label of the button.
                                'imageUrl'=>false,  //Image URL of the button.
                                'options'=>array('title' => 'Editar registro.'),
                                //'click'=>'',     //A JS function to be invoked when the button is clicked.
                                //'visible'=>'',   //A PHP expression for determining whether the button is visible.
                            ),
                            'delete' => array(
                                'label' => '<i class="glyphicon glyphicon-trash"></i>',
                                'imageUrl'=> false,
                                'options'=>array('title' => 'Eliminar registro.'),
                                //'click'=>'',     //A JS function to be invoked when the button is clicked.
                                //'visible'=>'',   //A PHP expression for determining whether the button is visible.
                            ),  
            ),
		),
	),
)); ?>
