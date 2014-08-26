<h3 class="text-center"><?php echo ucwords(CrugeTranslator::t("crear nuevo usuario"));?></h3>
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'crugestoreduser-form',
    'htmlOptions' =>array('class'=>'form-horizontal', 'role'=>'form'),
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
    <div class="well">
        <div class="form-group">
            <?php echo $form->labelEx($model,'username', array('class' =>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
        </div>	
        <div class="form-group">
            <?php echo $form->labelEx($model,'email',array('class'=>'col-md-4 control-label')); ?>
            <div class="col-md-8">
                <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>
        <div class="form-group">	
            <?php echo $form->labelEx($model,'newPassword', array('class'=>'col-md-4 control-label')); ?>
            <div class="col-md-6">
                <?php echo $form->textField($model,'newPassword', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'newPassword'); ?>
            </div>  
                <div class="col-md-2">
                <script>
                    function fnSuccess(data){
                            $('#CrugeStoredUser_newPassword').val(data);
                    }
                    function fnError(e){
                            alert("error: "+e.responseText);
                    }
                </script>
                <?php echo CHtml::ajaxbutton(
                        CrugeTranslator::t("Generar"),
                        Yii::app()->user->ui->ajaxGenerateNewPasswordUrl,
                        array('success'=>'js:fnSuccess','error'=>'js:fnError'),
                        array('class'=>'btn btn-info')
                ); ?>
                
            </div>
            
        </div>
            <?php 
                    if(count($model->getFields()) > 0){
                            echo "<div class='form-group'>";
                                foreach($model->getFields() as $f){
                                        // aqui $f es una instancia que implementa a: ICrugeField
                                        echo Yii::app()->user->um->getLabelField($f);
                                        echo "<div class='col-md-8'>";
                                        echo Yii::app()->user->um->getInputField($model,$f);
                                        echo $form->error($model,$f->fieldname);
                                        echo "</div>";
                                }
                            echo "</div>";
                    }
                ?>
    </div>
    <div class="text-center">
        <?php Yii::app()->user->ui->tbutton("Crear Usuario"); ?>
    </div>
    <?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>
