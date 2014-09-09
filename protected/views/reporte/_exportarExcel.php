<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'User-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass' => 'table table-hover',
        'enableSorting'=>false,
	'columns'=>array(
                array('name'=>'nombreCompleto','value'=>'User::getNombresApellidos($data->iduser)'),
		'username',
                'email',
                array(
                    'name'=>'state',
                    'value'=>'($data->state == 1) ? "Cuenta activada" : "Cuenta desactivada"',
                    ),
	),
)); ?>