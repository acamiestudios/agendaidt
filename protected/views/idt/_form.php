<?php
/* @var $this Idt */
/* @var $model Idt */
/* @var $form CActiveForm */
$js = Yii::app()->getClientScript();  
$js->registerScriptFile(Yii::app()->theme->baseUrl . '/js/util.js',CClientScript::POS_END);
?>

<div class="col-md-offset-2 col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'idt-form',
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
				<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','autocomplete'=>'off', 'required'=>'required','onBlur'=>'detectarEspacios(this)')); ?>
				<?php echo $form->error($model,'username'); ?>
                            <div id="checkVal"></div>
			</div>
		</div>
                <div class="form-group">
			<?php echo $form->labelEx($model,'password', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">                                
				<?php echo $form->textField($model,'password',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','autocomplete'=>'off')); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		</div>
                
                <div class="form-group">
			<?php echo $form->labelEx($model,'email', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','autocomplete'=>'off','required'=>'required')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		</div>
                
		<div class="form-group">
			<?php echo $form->labelEx($model,'nombres', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','autocomplete'=>'off','required'=>'required')); ?>
				<?php echo $form->error($model,'nombres'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'apellidos', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'apellidos',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','autocomplete'=>'off')); ?>
				<?php echo $form->error($model,'apellidos'); ?>
			</div>
		</div>

		<div class="form-group">
                    
			<?php echo $form->labelEx($model,'state', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<div class="btn-group" data-toggle="buttons">
			  		<label class="btn btn-primary <?php if($model->state == 1) echo 'active';?>">
						<?php echo $form->radioButton($model,'state',array('value'=>1,'uncheckValue'=>null)); ?>Si
					</label>
		  			<label class="btn btn-primary <?php if($model->state == 0) echo 'active';?>">
						<?php echo $form->radioButton($model,'state',array('value'=>0,'uncheckValue'=>null)); ?>No
					</label>
				</div>
					<?php echo $form->error($model,'state');?>
			</div>
			<?php echo $form->error($model,'state'); ?>
		</div>

		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget();?>

</div><!-- form -->