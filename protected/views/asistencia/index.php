<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'
);
$js=Yii::app()->getClientScript();
$js->registerScriptFile(Yii::app()->theme->baseUrl . '/js/valAsistencia.js',CClientScript::POS_END);
?>
<h2 class="text-center">Control de Asistencia de aprendices</h2>

<div class="panel panel-default">
    <div class="panel-body">
        <?php
        echo CHtml::beginForm('', 'post', array( 'id'=>'asistencia-form','name'=>'asistencia','class' => '', 'role' => 'form'));
        echo CHtml::errorSummary($model);
        echo '<div class="form-group">';
        echo CHtml::label('Ficha:','idFicha',array('class'=>'col-md-4'));
        echo CHtml::label('Fecha:','datepicker',array('class'=>'col-md-4'));
        echo CHtml::label('Hora:','hora',array('class'=>'col-md-4'));
        echo '</div>';
        echo '<div class="form-group">';
        echo '<div class="col-md-4">';
        echo CHtml::dropDownList( 'asistencia-form[idFicha]','',$dataFichas,array('empty'=>'-Seleccione-','class'=>'form-control',
            'ajax'=>array(                            
                        'type'=>'POST',
                        'url'=> CController::createUrl('getHoras'),
                        'beforeSend' => 'function(){
                            if( validarForm() == false ){
                                return false;
                            }
                            $("#resultado").html("");
                        }',
                        'complete' => 'function(){
                            $("#loading").removeClass("loading");
                            $("body").css("cursor", "default");
                        }',
                        'success'=>"function(data){
                            
                            if(data == ''){
                                $('#asistencia-form_idHorario').empty();
                                $('#asistencia-form_idHorario').append('<option value>-Seleccione-</option>');
                            }else{
                                $('#asistencia-form_idHorario').empty();
                                $('#asistencia-form_idHorario').append('<option value selected>-Seleccione-</option>');
                                $('#asistencia-form_idHorario').append(data);
                            }
                              }",                               
                    )      
            ));
        echo '</div>';
        echo '<div class="col-md-4">';
         $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'asistencia-form[datepicker]',
            'options'=>array(
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2014:2030',
                            'onSelect' => 'js:function() {'.
                                                CHtml::ajax(array(
                                                    'type'=>'POST',
                                                    'url'=> CController::createUrl('getHoras'),
                                                    'beforeSend' => 'function(){
                                                        if( validarForm() == false ){
                                                            return false;
                                                        }
                                                        $("#resultado").html("");
                                                    }',
                                                    'complete' => 'function(){
                                                            $("#loading").removeClass("loading");
                                                            $("body").css("cursor", "default");
                                                    }',
                                                    'success'=>"function(data){
                                                        if(data == ''){
                                                            $('#asistencia-form_idHorario').empty();
                                                            $('#asistencia-form_idHorario').append('<option value>-Seleccione-</option>');
                                                        }else{
                                                            $('#asistencia-form_idHorario').empty();
                                                            $('#asistencia-form_idHorario').append('<option value>-Seleccione-</option>');
                                                            $('#asistencia-form_idHorario').append(data);

                                                        }
                                                    }",

                                                ))
                                               . '}',
                        ),
                        'htmlOptions'=>array(
                            'class'=>'form-control ',
                        ),
        ));
        echo '</div>';
        echo '<div class="col-md-4">';
        echo CHtml::dropDownList('asistencia-form[idHorario]','',array(),array(
                'empty'=>'-Seleccione-',
                'class'=>'form-control',
                'ajax'=>array(
                    'type'=>'post',
                    'url'=>CController::createUrl('getAlumnos'),
                    'beforeSend'=>'function(){
                                        if( validarForm() == false ){
                                            return false;
                                        }
                                        if( $("#asistencia-form_idHorario").val() == "" ){
                                            $("#loading").removeClass("loading");
                                            $("body").css("cursor", "default");
                                            $("#resultado").html("");
                                            return false;
                                        }
                                    }
                    ',
                    'complete' => 'function(){
                            $("#loading").removeClass("loading");
                            $("body").css("cursor", "default");
                    }',
                    'success'=>"function(data){
                                    if(data == ''){
                                    }else{
                                        $('#resultado').html(data);
                                        $('#listaAprendices_idHorario').val( $('#asistencia-form_idHorario').val() );
                                    }
                                }",
                ),
            ));
        echo '</div>';
        echo '</div>';
        echo CHtml::endForm();

        ?>
    </div>
</div>
<div class="col-md-offset-1 col-md-10">
    <div id="loading"></div>
    
    
    <div id="resultado" class="text-center">
        <?php if( Yii::app()->user->hasFlash('success') ){
            ?>
            <div class="alert alert-success"><?php echo Yii::app()->user->getFlash('success');?></div>
            <?php
        }
        ?>
    </div>
 </div>
