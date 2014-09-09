
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<div class="col-md-offset-4 col-md-4">
<div class="well mi-box">
    <h3 class="text-center"><?php echo CrugeTranslator::t('logon',"Login"); ?></h3><br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logon-form',
        'focus'=>array($model,'username'),
        'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="form-group">
            
		<?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>'Usuario')); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>

	<div class="form-group">
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Contraseña')); ?>
		<?php echo $form->error($model,'password'); ?>
        </div>
        
	<div class="text-center">
            <?php Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login")); ?>
            
	</div>
        <!--<div class="text-center">-->
            <?php //echo '[' . Yii::app()->user->ui->passwordRecoveryLink . ']&nbsp;&nbsp;'; ?>
            <?php
                if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
                        echo '[' . Yii::app()->user->ui->registrationLink . ']';
            ?>
        <!--</div>-->
	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	

<?php $this->endWidget(); ?>
</div>
<?php endif; ?>
</div>