<?php
/* @var $this AprendizController */
/* @var $model Aprendiz */
/* @var $form CActiveForm */
?>

<div class="col-md-offset-2 col-md-8">
    <?php
        if( Yii::app()->user->hasFlash('mensaje') ){
            echo '<div class="alert alert-'. Yii::app()->user->getFlash('tipoAlerta') . '">' . Yii::app()->user->getFlash('mensaje') . '</div>';
        }
    ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'calendario-form',
		'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
                'enableClientValidation'=>false,
                'focus'=>array($model,'title'),
            
	)); ?>

		<p class="note text-center">Campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger', 'role' => 'alert')); ?>

                <div class="form-group">
			<?php echo $form->labelEx($model,'title', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50, 'class' => 'form-control','required'=>'required','autocomplete'=>'off')); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>
		</div>
                
		<div class="form-group">
			<?php echo $form->labelEx($model,'fecha_ini', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-3">
                            <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                    'model'=>$model,
                                    'attribute'=>'fecha_ini',
                                    'options'=>array(
                                                    'dateFormat' => 'yy-mm-dd',
                                                    'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                    'changeMonth'=>true,
                                                    'changeYear'=>true,
                                                    'yearRange'=>'2014:2030',
                                                ),
                                                'htmlOptions'=>array(
                                                    'class'=>'form-control',
                                                    'placeholder'=>'Fecha inicio',
                                                    'required'=>'required',
                                                ),
                                ));?>
                            
			</div>
                    <?php echo $form->labelEx($model,'hora_ini',array('class'=> 'col-md-2 control-label')); ?>
                    <div class="col-md-3">
                        <?php echo $form->dropDownList($model, 'hora_ini', CHtml::listData(Hora::model()->findAll(),'valor', 'valor'),array('empty'=>'-Seleccione-','class'=>'form-control','required'=>'required'));?>
                    </div>
		</div>
                <div class="form-group">
			<?php echo $form->labelEx($model,'fecha_fin', array('class' => 'col-md-4 control-label') ); ?>
			<div class="col-md-3">
                            <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                    'model'=>$model,
                                    'attribute'=>'fecha_fin',
                                    'options'=>array(
                                                    'dateFormat' => 'yy-mm-dd',
                                                    'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                    'changeMonth'=>true,
                                                    'changeYear'=>true,
                                                    'yearRange'=>'2014:2030',
                                                ),
                                                'htmlOptions'=>array(
                                                    'class'=>'form-control',
                                                    'placeholder'=>'Fecha final',
                                                ),
                                ));?>
                            
			</div>
                    <?php echo $form->labelEx($model,'hora_fin',array('class'=> 'col-md-2 control-label')); ?>
                    <div class="col-md-3">
                        <?php echo $form->dropDownList($model, 'hora_fin', CHtml::listData(Hora::model()->findAll(),'valor', 'valor'),array('empty'=>'-Seleccione-','class'=>'form-control'));?>
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
                            <?php echo CHtml::link('Cancelar', array('admin'), array('class' => 'btn btn-danger') ); ?>			
                    </div>
		</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->