<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'aprendiz-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
                'focus'=>array($model,'cedula'),
            
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

                <div class="form-group">
			<?php echo $form->labelEx($model,'cedula', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'cedula',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','required'=>'required')); ?>
				<?php echo $form->error($model,'cedula'); ?>
			</div>
		</div>
                
		<div class="form-group">
			<?php echo $form->labelEx($model,'primer_nombre', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'primer_nombre',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','required'=>'required')); ?>
				<?php echo $form->error($model,'primer_nombre'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'segundo_nombre', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'segundo_nombre',array('size'=>50,'maxlength'=>50, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'segundo_nombre'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'primer_apellido', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'primer_apellido',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','required'=>'required')); ?>
				<?php echo $form->error($model,'primer_apellido'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'segundo_apellido', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'segundo_apellido',array('size'=>50,'maxlength'=>50, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'segundo_apellido'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'idFicha', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
                            <?php echo $form->dropDownList($model, 'idFicha', CHtml::listData(Ficha::model()->findAll(),'idFicha', 'nombre'),array('empty'=>'-Seleccione-','class'=>'form-control','required'=>'required'));?>
                            <?php echo $form->error($model,'idFicha'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->