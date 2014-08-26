<?php
	/*
		$model:  es una instancia que implementa a CrugeAuthItemEditor
	*/
	
?>
<h3 class="text-center"><?php echo ucwords(CrugeTranslator::t("editando")." ".CrugeTranslator::t($model->categoria));?></h3>
<?php $this->renderPartial('_authitemform',array('model'=>$model),false);?>