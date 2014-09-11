<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<h2 class="text-center">Bienvenido a <?php echo CHtml::encode(Yii::app()->name); ?></h2>

<div class="col-md-3">
    <a href="<?php echo Yii::app()->createUrl('/reporte/idts');?>">
        <div class="btn-inicio">
            <h1>Instructores</h1>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/instructores.png" alt="Instructores" title="Instructores">
        </div>
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Yii::app()->createUrl('/reporte/aprendices');?>">
        <div class="btn-inicio">
            <h1>Aprendices</h1>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/aprendices.png" alt="Aprendices" title="Aprendices">
        </div>
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Yii::app()->createUrl('/reporte/horarios');?>">
        <div class="btn-inicio">
            <h1>Horarios</h1>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/reloj.png" alt="Horarios" title="Horarios">
        </div>
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Yii::app()->createUrl('/calendario');?>">
        <div class="btn-inicio">
            <h1>Calendario</h1>
            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/calendario.png" alt="Calendario" title="Calendario">
        </div>
    </a>
</div>
