<?php
/* @var $this CalendarioController */

$this->breadcrumbs=array(
	'Calendario',
);
?>
<div class="col-md-offset-2 col-md-8">
<?php if( Yii::app()->user->checkAccess('role_Coordinador') ) { echo CHtml::link('Nuevo evento <i class="glyphicon glyphicon-plus"></i>',array('create'),array('class' => 'btn btn-success pull-right btn-nuevoEvento')); } ?>
    <?php
    $this->widget('ext.akFCal.EFullCalendar', array(
        'lang'=>'es',
        'themeCssFile'=>'redmond/jquery-ui-1.9.2.custom.css',
        'htmlOptions'=>array(
            'style'=>'width:100%'
        ),
        'options'=>array(
            'header'=>array(
                'left'=>'prev,next',
                'center'=>'title',
                'right'=>'today,year,month,agendaWeek,agendaDay'
            ),
            'lazyFetching'=>true,
            'events'=> Calendario::getEventos(), //$calendarEventsUrl, // action URL for dynamic events, or
            'eventRender'=>'js:function (event, element) {
                element.attr("href", "javascript:void(0);");
                element.attr("onclick", "openModal(\'" + event.title + "\', \'" + event.descripcion + "\', \'" + event.url + "\', \'" + event.fecha_ini + "\', \'" + event.fecha_fin + "\');");
            }',
        )
    ));
?>
</div>

<div id="eventContent" title="Event Details" style="display:none;">
    <span id="startTime"></span>
    <span id="endTime"></span>
    <div id="eventInfo"></div>
<!--    <p><strong><a id="eventLink" href="" target="_blank">Leer más</a></strong></p>-->
</div>

<?php
Yii::app()->clientScript->registerScript('pr','
');
?>
<script type="text/javascript">
    function openModal(title, info, url,start, end) {
        if (start && start != "null") {
            $("#startTime").html("<b>De</b> " + start + "<br />")
        } else {
            $("#startTime").html(""); //no start (huh?) clear out previous info.
        }
        if (end && end != "null")
        {
            $("#endTime").html("<b>a</b> " + end + "<br /><br />")
        } else {
            $("#endTime").html(""); //no end. clear out previous info.
        }
        $("#eventInfo").html(info);
//        $("#eventLink").attr("href", url);
        $("#eventContent").dialog({ modal: true, title: title, width:350 });
    }
</script>
