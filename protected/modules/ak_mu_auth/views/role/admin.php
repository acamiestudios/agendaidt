<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Roles'=>array('admin'),
	'Administrar',
);
?>
<h2 class="text-center">Administrar Roles</h2>
<?php echo CHtml::link('Nuevo <i class="glyphicon glyphicon-plus"></i>',array('create'),array('class' => 'btn btn-success pull-right')); ?><p>
<div class="col-md-offset-2 col-md-8">
    <div id="user-grid" class="grid-view">
        <div class="summary text-right"><?php echo count(Yii::app()->authManager->getAuthItems());?> resultados.</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th id="user-grid_c0">Nombre</th>
                    <th class="button-column" id="user-grid_c4">Acción</th>
                </tr>
                <tr class="filters">
            </thead>
            <tbody>
                <?php
                foreach( Yii::app()->authManager->getAuthItems(2) as $data ){
                    echo '<tr><td class="col-md-6">' . $data->name . '</td>';
                    echo '<td class="button-column">' . CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>',array('/ak_mu_auth/rol/view/' . $data->name) ) . CHtml::link('<i class="glyphicon glyphicon-pencil"></i>',array('/ak_mu_auth/rol/view/' , $data->name) ) . CHtml::link('<i class="glyphicon glyphicon-trash"></i>',array('/ak_mu_auth/rol/view/' , $data->name) ) . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table table-hover',
	'columns'=>array(
			'name',
		array(
			'class'=>'CButtonColumn',
			
		),
	),
    )); ?>
