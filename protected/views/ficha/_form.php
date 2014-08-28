<?php
/* @var $this FichaController */
/* @var $model Ficha */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ficha-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
                'focus'=>array($model,'codigo'),
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'codigo', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'codigo',array('size'=>20,'maxlength'=>20, 'class' => 'form-control','autocomplete'=>'off','required'=>'required')); ?>
				<?php echo $form->error($model,'codigo'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'nombre', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100, 'class' => 'form-control','autocomplete'=>'off','required'=>'required')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->