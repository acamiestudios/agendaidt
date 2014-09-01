<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'asistencia-form',
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
			<?php echo $form->labelEx($model,'idAprendiz', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->dropDownList($model,'idAprendiz',CHtml::listData(Aprendiz::model()->findAll(),'idAprendiz','cedula'),array('empty'=>'-Seleccione-','class' => 'form-control')); ?>
				<?php echo $form->error($model,'idAprendiz'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'idHorario', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'idHorario',array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'idHorario'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'fechaAsistencia', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'fechaAsistencia',array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'fechaAsistencia'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'asistio', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'asistio',array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'asistio'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->