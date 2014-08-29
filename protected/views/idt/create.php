<?php
/* @var $this IdtController */
/* @var $model Idtr */

$this->breadcrumbs=array(
	"IDT'S"=>array('admin'),
	'Crear',
);
?>

<h2 class="text-center">Crear IDT</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>