<?php 
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
    )); 
    ?>
        
        <fieldset>
            <legend>Login</legend>
            <?php echo $form->textField($model,'username',array('class'=>'input-block-level','placeholder'=>'Usuario')); ?>
            <?php echo $form->error($model,'username'); ?>
            <?php echo $form->passwordField($model,'password',array('class'=>'input-block-level','placeholder'=>'Password')); ?>
            <?php echo $form->error($model,'password'); ?>
            <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary pull-right')); ?>
            <?php //echo $form->checkBox($model,'rememberMe'); ?>
            <?php //echo $form->label($model,'rememberMe'); ?>
            <?php //echo $form->error($model,'rememberMe'); ?>
        </fieldset>
          
<?php $this->endWidget(); ?>

