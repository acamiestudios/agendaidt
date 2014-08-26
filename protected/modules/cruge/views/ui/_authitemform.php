<?php 
	/* formulario comun para create y update
	
		argumento:
		
		$model: instancia de CrugeAuthItemEditor
	*/
?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'authitem-form',
    'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
    <div class="well">
        <div class=" form-group">
            <?php echo $form->labelEx($model,'name',array('class'=>'col-md-4 control-label')); ?>
            <div class='col-md-8'>
                    <?php echo $form->textField($model,'name',array('size'=>64,'maxlength'=>64,'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'name'); ?>
            </div>
        </div>
	<div class="form-group">
            <?php echo $form->labelEx($model,'description',array('class'=>'col-md-4 control-label')); ?>
            <div class='col-md-8'>
		<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
		<?php if($model->categoria  == "tarea") { ?>
		<div class='hint'>Tip: precede este valor con un ":" para que la tarea sea exportada como un menuitem al usar<br/> <span class='code'>
		Yii::app()->user->rbac->getMenu();</span> y finalizala con un {nombremenuitem} para que quede dentro de un -nombremenuitem-.
		ejemplo: <span class='code'>":Edita tu Perfil{menuprincipal}"</span></div>
		<?php } ?>
            </div>
        </div>
	<div class="form-group">
            <?php echo $form->labelEx($model,'businessRule',array('class'=>'col-md-4 control-label')); ?>
            <div class='col-md-8'>
		<?php echo $form->textField($model,'businessRule',array('size'=>50,'maxlength'=>512,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'businessRule'); ?>
		<p class='hint'>
			<?php echo CrugeTranslator::t("define una regla de negocio que sera ejecutada cada vez que este item sea evaluado mediante una llamada a checkAccess, el argumento params es entregado a checkAccess de forma opcional:"); ?>
			<br/>
			<?php echo CrugeTranslator::t(
			"regla de ejemplo:"); ?>
			<br/>
			<div class='code'>return Yii::app()->user->id==$params["post"]->authID;</div>
			<br/>
			<div class='code'>
				$params = ...<?php echo CrugeTranslator::t("cualquier cosa"); ?>...;<br/>
				if(Yii::app()->user->checkAccess('<?php echo $model->name;?>', $params)){ ... }
			</div>
			<br/>
		</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="text-center">
            <?php Yii::app()->user->ui->tbutton(($model->isNewRecord ? 'Crear Nuevo' : 'Actualizar')); ?>
            <?php Yii::app()->user->ui->bbutton("Volver",'volver'); ?>
        </div>
    </div>
    <?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>
