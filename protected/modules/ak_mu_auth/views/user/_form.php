<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'username', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'password', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>80, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'name', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->