<h3 class="text-center"><?php echo ucwords(CrugeTranslator::t("roles"));?></h3>


<?php echo CHtml::link(CrugeTranslator::t("<i class='glyphicon glyphicon-plus'></i> Crear Nuevo Rol"),
	Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE),
        array('class'=>'btn btn-success pull-right')
        );?>
<div class="clearfix"></div>
<br>

    <?php $this->renderPartial('_listauthitems',array('dataProvider'=>$dataProvider),false);?>
