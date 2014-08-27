<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */

//in your view where you want to include JavaScripts
$js = Yii::app()->getClientScript();  
$js->registerScriptFile(Yii::app()->theme->baseUrl . '/js/util.js',CClientScript::POS_END);
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
			<?php echo $form->labelEx($model,'hora_ini', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
                            <?php echo $form->timeField($model,'hora_ini',array('class' => 'form-control','onBlur'=>'CheckTime(this)')); ?>
                            <?php echo $form->error($model,'hora_ini'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'hora_fin', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
                            <?php echo $form->timeField($model,'hora_fin',array('class' => 'form-control','onBlur'=>'CheckTime(this)')); ?>
                            <?php echo $form->error($model,'hora_fin'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'dia', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->dropDownList($model,'dia',array('Lunes'=>'Lunes','Martes'=>'Martes','Miercoles'=>'Miercoles','Jueves'=>'Jueves','Viernes'=>'Viernes','Sábado'=>'Sábado','Domingo'=>'Domingo'),array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'dia'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'idFicha', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
                            <?php echo $form->dropDownList($model, 'idFicha', CHtml::listData(Ficha::model()->findAll(),'idFicha', 'nombre'),array('empty'=>'-Seleccione-','class'=>'form-control'));?>
                            <?php echo $form->error($model,'idFicha'); ?>
			</div>
		</div>

		<!--<div class="form-group">
			<?php // echo $form->labelEx($model,'idInstructor', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
                                <?php
                                
                                
//                                $idts=Yii::app()->user->um->searchUsersByAuthItemArr('Instructor');
//                                echo '<pre>';
//                                print_r($idts);exit;
                                ?>
				<?php // echo $form->dropDownList($model,'idInstructor',CHtml::listData($idts,'iduser','idt'),array('empty'=>'-Seleccione-','class'=>'form-control')); ?>
				<?php // echo $form->error($model,'idInstructor'); ?>
			</div>
		</div>
-->
		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-success')); ?>
				<?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			</div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->