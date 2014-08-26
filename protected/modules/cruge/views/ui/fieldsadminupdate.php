<?php
    /*
            $model:  es una instancia que implementa a ICrugeField
    */
?>
<h3 class="text-center">
    <?php echo ucwords(CrugeTranslator::t((($model->isNewRecord==1) ? "creando nuevo campo personalizado" :"editando campo personalizado")));?>
</h3>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'crugefield-form',
    'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
    <div class="well">
	<h3><?php echo ucfirst(CrugeTranslator::t("datos del campo"));?></h3>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'fieldname', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
		<?php echo $form->textField($model,'fieldname',array('size'=>15,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'fieldname'); ?>
            </div>
        </div>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'longname', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
		<?php echo $form->textField($model,'longname',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'longname'); ?>
            </div>
        </div>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'position', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
		<?php echo $form->textField($model,'position',array('size'=>5,'maxlength'=>3,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'position'); ?>
            </div>
        </div>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'required', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
		<?php echo $form->checkBox($model,'required'); ?>
		<?php echo $form->error($model,'required'); ?>
            </div>
        </div>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'showinreports', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
		<?php echo $form->checkBox($model,'showinreports'); ?>
		<?php echo $form->error($model,'showinreports'); ?>
            </div>
        </div>
    </div>

    <div class="well">
	<h3><?php echo ucfirst(CrugeTranslator::t("datos del contenido"));?></h3>
	<div class="form-group">
            <?php echo $form->labelEx($model,'fieldtype', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->dropDownList($model,'fieldtype'
                        ,Yii::app()->user->um->getFieldTypeOptions(),array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'fieldtype'); ?>
            </div>
        </div>
        <div class='form-group'>
            <?php echo $form->labelEx($model,'fieldsize', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->textField($model,'fieldsize',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'fieldsize'); ?>
            </div>
        </div>
        <div class='form-group'>
            <?php echo $form->labelEx($model,'maxlength', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->textField($model,'maxlength',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'maxlength'); ?>
                <i><?php echo CrugeTranslator::t("maxlength = -1 causa que no se valide el tamano de este campo");?></i>
            </div>
	</div>
	
        <div class='form-group'>
            <?php echo $form->labelEx($model,'predetvalue', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->textArea($model,'predetvalue',array('class'=>'form-control','rows'=>3)); ?>
                <?php echo $form->error($model,'predetvalue'); ?>
                <p class='hint'><?php echo CrugeTranslator::t(
                    "si el fieldtype es un Listbox ponga aqui las opciones una por cada linea,
                     el valor coloquelo al inicio seguido de una coma, ejemplo:
                     <ul style='list-style: none;'>
                     <li>1, azul</li>
                     <li>2, rojo</li>
                     <li>3, verde</li>
                     </ul>
                    "
                    );?></p>
            </div>
	</div>
    </div>

    <div class="well">
	<h3><?php echo ucfirst(CrugeTranslator::t("datos de validacion"));?></h3>
	<div class='form-group'>
            <?php echo $form->labelEx($model,'useregexp', array('class' =>'col-md-4 control-label')); ?>
            <div class='col-md-8'>
                <?php echo $form->textArea($model,'useregexp',array('rows'=>5,'cols'=>40,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'useregexp'); ?>
                <p class='hint'><?php echo CrugeTranslator::t("dejar en blanco si no se quiere usar");?></p>
                <?php echo ucfirst(CrugeTranslator::t(
                            "La expresion regular (regexp) es una lista de caracteres
                             que validan la sintaxis de lo que el usuario ingrese en este campo.
                             por ejemplo:"
                    ));
                    echo "<br/><u>".CrugeTranslator::t("telefono:")."</u><br/>^([0-9-.+ \(\)]{3,20})$";
                    echo "<br/><u>".CrugeTranslator::t("digitos y letras:")."</u><br/>^([a-zA-Z0-9]+)$";
                ?>
            </div>
        </div>
        
	<div class='form-group'>
            <?php echo $form->labelEx($model,'useregexpmsg', array('class' =>'col-md-4 control-label')); ?>
            <div class='col-md-8'>
		<?php echo $form->textField($model,'useregexpmsg',array('size'=>50,'maxlength'=>512,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'useregexpmsg'); ?>
            </div>
        </div>
    </div>
    <div class='form-group'>
        <div class='text-center'>
            <?php Yii::app()->user->ui->tbutton(($model->isNewRecord ? "Crear Campo" : "Actualizar Campo")); ?>
        </div>
    </div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>

