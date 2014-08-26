<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<h2>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>

<div class="col-md-3">
    <a href="#<?php //echo Yii::app()->createUrl(array('/site'));?>">
        <div class="btn-inicio">
            <h1>Instructores</h1>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/instructores.png" alt="Instructores" title="Instructores">
        </div>
    </a>
</div>
