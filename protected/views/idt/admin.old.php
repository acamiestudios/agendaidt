<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	"IDT'S"=>array('admin'),
	'Administrar',
);
?>
<h2 class="text-center">Administrar IDT's</h2>
<?php echo CHtml::link('Nuevo <i class="glyphicon glyphicon-plus"></i>',array('create'),array('class' => 'btn btn-success pull-right')); ?><p>
Opcionalmente puedes usar operadores de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) en el comienzo de cada campo de busqueda.
</p>

<?php 
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
$cols[] = array( 'name'=>'nombres','value'=>Yii::app()->user->um->getFieldValue($model->iduser,'nombres'));
	
$cols[] = array(
	'class'=>'CButtonColumn',
	'header' => 'Acción',
	'template' => '{view} {update} {delete}',
	//'deleteConfirmation'=>CrugeTranslator::t('admin', 'Are you sure you want to delete this user'),
	'buttons' => array(
                        'view' => array(
                                'label' => '<i class="glyphicon glyphicon-eye-open"></i>',
                                'imageUrl'=>false,  //Image URL of the button.
                                'options'=>array('title' => 'Ver registro.', 'class' => 'linkBacion'),
                                //'click'=>'',     //A JS function to be invoked when the button is clicked.
                                //'visible'=>'',   //A PHP expression for determining whether the button is visible.
                        ),
			'update'=>array(
                                'label' => '<i class="glyphicon glyphicon-pencil"></i>',     //Text label of the button.	
				'url'=>'array("update","id"=>$data->getPrimaryKey())',
                                'imageUrl'=>false,  //Image URL of the button.
                                'options'=>array('title' => CrugeTranslator::t('admin', 'Update User')),
			),
			'delete'=>array(
                                'label' => '<i class="glyphicon glyphicon-trash"></i>',
				'url'=>'array("delete","id"=>$data->getPrimaryKey())',
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

