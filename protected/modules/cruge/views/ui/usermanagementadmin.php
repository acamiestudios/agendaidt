<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Administrar',
);
?>
<h2 class="text-center"><?php echo ucwords(CrugeTranslator::t('admin', 'Manage Users'));?></h2>
<?php echo CHtml::link('Nuevo <i class="glyphicon glyphicon-plus"></i>',array("usermanagementcreate"),array('class' => 'btn btn-success pull-right')); ?><p>
Opcionalmente puedes usar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) en el comienzo de cada campo de busqueda.
</p>
<?php 
/*
	para darle los atributos al CGridView de forma de ser consistente con el sistema Cruge
	es mejor preguntarle al Factory por los atributos disponibles, esto es porque si se decide
	cambiar la clase de CrugeStoredUser por otra entonces asi no haya dependenci directa a los
	campos.
*/
$cols = array();

// presenta los campos de ICrugeStoredUser
foreach(Yii::app()->user->um->getSortFieldNamesForICrugeStoredUser() as $key=>$fieldName){
	$value=null; // default
	$filter=null; // default, textbox
	$type='text';
	if($fieldName == 'state'){
		$value = '$data->getStateName()';
		$filter = Yii::app()->user->um->getUserStateOptions();
	}
	if($fieldName == 'logondate'){
		$type='datetime';
	}
	$cols[] = array('name'=>$fieldName,'value'=>$value,'filter'=>$filter,'type'=>$type);
}
	
$cols[] = array(
	'class'=>'CButtonColumn',
	'header' => 'Acción',
	'template' => '{update} {del}',
	'deleteConfirmation'=>CrugeTranslator::t('admin', 'Are you sure you want to delete this user'),
	'buttons' => array(
			'update'=>array(
                                'label' => '<i class="glyphicon glyphicon-pencil"></i>',     //Text label of the button.	
				'url'=>'array("usermanagementupdate","id"=>$data->getPrimaryKey())',
                                'imageUrl'=>false,  //Image URL of the button.
                                'options'=>array('title' => CrugeTranslator::t('admin', 'Update User')),
			),
			'del'=>array(
                                'label' => '<i class="glyphicon glyphicon-trash"></i>',
				'url'=>'array("usermanagementdelete","id"=>$data->getPrimaryKey())',
                                'imageUrl'=> false,
                                'options'=>array('title' => CrugeTranslator::t('admin', 'Delete User') ),
			),
		),	
);
$this->widget(Yii::app()->user->ui->CGridViewClass, 
	array(
    'dataProvider'=>$dataProvider,
    'columns'=>$cols,
    'filter'=>$model,
    'itemsCssClass' => 'table table-hover',
));
?>
</div>