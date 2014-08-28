<?php
/* @var $this ReunionController */
/* @var $model Reunion */
/* @var $form CActiveForm */
$js=Yii::app()->getClientScript();
$js->registerScriptFile(Yii::app()->theme->baseUrl . '/js/util.js', CClientScript::POS_END);
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'reunion-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

		<div class="form-group">
			<?php echo $form->labelEx($model,'fecha', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php //echo $form->textField($model,'fecha',array('class' => 'form-control')); 
                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'model'=>$model,
                                        'attribute'=>'fecha',
                                        // additional javascript options for the date picker plugin
                                        'options'=>array(
                                            'dateFormat' => 'yy-mm-dd',
                                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'yearRange'=>'2014:2030',
                                        ),
                                        'htmlOptions'=>array(
                                            'class'=>'form-control',
                                        ),
                                    ));?>
				<?php echo $form->error($model,'fecha'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'hora_ini', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->timeField($model,'hora_ini',array('size'=>5,'maxlength'=>5, 'class' => 'form-control','onBlur'=>'CheckTime(this)')); ?>
				<?php echo $form->error($model,'hora_ini'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'hora_fin', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->timeField($model,'hora_fin',array('size'=>5,'maxlength'=>5, 'class' => 'form-control','onBlur'=>'CheckTime(this)')); ?>
				<?php echo $form->error($model,'hora_fin'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'descripcion', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textArea($model,'descripcion',array('rows'=>4, 'class' => 'form-control')); ?>
				<?php echo $form->error($model,'descripcion'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->