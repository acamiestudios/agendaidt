<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'horario-form',
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
			<?php echo $form->labelEx($model,'idFicha', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->dropDownList($model, 'idFicha', CHtml::listData(Ficha::model()->findAll(),'idFicha', 'nombre'),array('empty'=>'-Seleccione-','class'=>'form-control','required'=>'required'));?>
				<?php echo $form->error($model,'idFicha'); ?>
			</div>
		</div>
                
		<div class="form-group">
			<?php echo $form->labelEx($model,'idHora', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->dropDownList($model, 'idHora', CHtml::listData(Hora::model()->findAll(),'idHora', 'valor'),array('empty'=>'-Seleccione-','class'=>'form-control','required'=>'required'));?>
				<?php echo $form->error($model,'idHora'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'dia', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->dropDownList($model,'dia',array(1=>'Lunes',2=>'Martes',3=>'Miércoles',4=>'Jueves',5=>'Viernes',6=>'Sábado',0=>'Domingo'),array('empty'=>'-Seleccione-','class' => 'form-control','required'=>'required')); ?>
				<?php echo $form->error($model,'dia'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->