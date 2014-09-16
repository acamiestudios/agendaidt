<?php
$this->breadcrumbs=array(
    'Configuracion'
);?>
<h2 class="text-center">Configuración</h2>
<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'configuracion-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
                'focus'=>array($model,'alertaInasistencias'),
            
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

                <div class="form-group">
			<?php echo $form->labelEx($model,'alertaInasistencias', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-4">
				<?php echo $form->textField($model,'alertaInasistencias',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','required'=>'required')); ?>
				<?php echo $form->error($model,'alertaInasistencias'); ?>
			</div>
		</div>
                
		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton('Guardar',array('class' => 'btn btn-success')); ?>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
