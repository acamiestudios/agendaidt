<?php
    $this->breadcrumbs=array(
            'Usuarios'=>array('/cruge/ui/usermanagementadmin'),
            'Administrar',
    );
?>
<h2 class="text-center"><?php echo ucwords(CrugeTranslator::t("eliminar usuario"));?></h2>
<div class="form">
    <?php
            /*
                    $model:  es una instancia que implementa a ICrugeStoredUser
            */
    ?>
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'crugestoreduser-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>false,
    )); ?>
        <h4>
            Usuario: <?php echo $model->username; ?><br>
            Email: <?php echo $model->email; ?>
        </h4>
        <p>
            <?php echo ucfirst(CrugeTranslator::t("marque la casilla para confirmar la eliminacion")); ?>
            <?php echo $form->checkBox($model,'deleteConfirmation'); ?>
            <?php echo $form->error($model,'deleteConfirmation'); ?>
        </P>

        <?php Yii::app()->user->ui->tbutton("Eliminar Usuario"); ?>
        <?php Yii::app()->user->ui->bbutton("Volver",'cancelar','btn btn-danger'); ?>

        <?php echo $form->errorSummary($model); ?>
    <?php $this->endWidget(); ?>
</div>