<?php
	/*
		$model:  
			es una instancia que implementa a ICrugeStoredUser, y debe traer ya los campos extra 	accesibles desde $model->getFields()
		
		$boolIsUserManagement: 
			true o false.  si es true indica que esta operandose bajo el action de adminstracion de usuarios, si es false indica que se esta operando bajo 'editar tu perfil'
	*/
?>
<h3 class="text-center">
    <?php echo ucwords(CrugeTranslator::t($boolIsUserManagement ? "editando usuario" : "editando tu perfil"));?>
</h3>
<div class="col-md-offset-2 col-md-8">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'crugestoreduser-form',
        'htmlOptions' => array( 'class' => 'form-horizontal', 'role' => 'form'),
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>false,
    )); ?>
        <div class="well">
            <h3><?php echo ucfirst(CrugeTranslator::t("datos de la cuenta"));?></h3>
            <div class="form-group">
                <?php echo $form->labelEx($model,'username', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-8">
                    <?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'email', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-8">
                    <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>
            </div>
            <div class="form-group">
                    <?php echo $form->labelEx($model,'newPassword', array('class' => 'col-md-4 control-label')); ?>
                    <div class="col-md-8">
                        <?php echo $form->textField($model,'newPassword',array('size'=>10,'maxlength'=>50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model,'newPassword'); ?>
                        <script>
                                function fnSuccess(data){
                                        $('#CrugeStoredUser_newPassword').val(data);
                                }
                                function fnError(e){
                                        alert("error: "+e.responseText);
                                }
                        </script>
                        <?php echo CHtml::ajaxbutton(
                                CrugeTranslator::t("Generar una nueva clave")
                                ,Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
                                ,array('success'=>new CJavaScriptExpression('fnSuccess'),
                                        'error'=>new CJavaScriptExpression('fnError'))
                        ); ?>
                    </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'regdate', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-8">
                    <?php echo $form->textField($model,'regdate'
                                ,array(
                                        'readonly'=>'readonly',
                                        'value'=>Yii::app()->user->ui->formatDate($model->regdate),
                                        'class' => 'form-control'
                                )
                    ); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'actdate', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-8">
                    <?php echo $form->textField($model,'actdate'
                                    ,array(
                                            'readonly'=>'readonly',
                                            'value'=>Yii::app()->user->ui->formatDate($model->actdate),
                                            'class' => 'form-control'
                                    )
                        ); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'logondate', array('class' => 'col-md-4 control-label')); ?>
                <div class="col-md-8">
                    <?php echo $form->textField($model,'logondate'
                                ,array(
                                        'readonly'=>'readonly',
                                        'value'=>Yii::app()->user->ui->formatDate($model->logondate),
                                        'class' => 'form-control',
                                )
                        ); ?>
                </div>
            </div>
        </div>

            <!-- inicio de campos extra definidos por el administrador del sistema -->
            <?php 
                if(count($model->getFields()) > 0){
                    echo '<div class="well">';
                        echo "<h3 class='text-center'>".ucfirst(CrugeTranslator::t("perfil"))."</h3>";
                            foreach($model->getFields() as $f){
                                    // aqui $f es una instancia que implementa a: ICrugeField
                                    echo "<div class='form-group'>";
                                    echo Yii::app()->user->um->getLabelField($f);
                                    echo "<div class='col-md-8'>";
                                    echo Yii::app()->user->um->getInputField($model,$f);
                                    echo $form->error($model,$f->fieldname);
                                    echo "</div>";
                                    echo "</div>";
                            }
                    echo '</div>';
                }
            ?>
            <!-- fin de campos extra definidos por el administrador del sistema -->
  
        
            <!-- inicio de opciones avanazadas, solo accesible bajo el rol 'admin' -->
            <?php 
                if($boolIsUserManagement)
                if(Yii::app()->user->checkAccess('edit-advanced-profile-features'
                        ,__FILE__." linea ".__LINE__))
                        $this->renderPartial('_edit-advanced-profile-features'
                                ,array('model'=>$model,'form'=>$form),false); 
            ?>
            <!-- fin de opciones avanazadas, solo accesible bajo el rol 'admin' -->
       
        <div class="form-group">
            <div class="text-center">
                <?php Yii::app()->user->ui->tbutton("Guardar Cambios"); ?>
            </div>
        </div>
        <?php echo $form->errorSummary($model); ?>
    <?php $this->endWidget(); ?>  
</div>