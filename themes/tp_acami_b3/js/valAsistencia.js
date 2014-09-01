(function($){
    validarForm=function(){
        var retornar = true;
        if( $("#asistencia-form_idFicha").val() !== "" ){
            $("#asistencia-form_idFicha").parent().closest("div").addClass("has-success");
            $("#asistencia-form_idFicha").parent().closest("div").removeClass("has-error");
        }else{
            $("#asistencia-form_idHorario").empty();
            $("#asistencia-form_idHorario").append("<option value>-Seleccione-</option>");
            $("#asistencia-form_idFicha").parent().closest("div").removeClass("has-success");
            $("#asistencia-form_idFicha").parent().closest("div").addClass("has-error");
            retornar = false;
        }

        if( $("#asistencia-form_datepicker").val() !== "" ){
            $("#asistencia-form_datepicker").parent().closest("div").addClass("has-success");
            $("#asistencia-form_datepicker").parent().closest("div").removeClass("has-error");
        }else{
            $("#asistencia-form_datepicker").parent().closest("div").removeClass("has-success");
            $("#asistencia-form_datepicker").parent().closest("div").addClass("has-error");
            retornar = false;
        }

        if( $("#asistencia-form_idHorario").val() !== "" ){
            $("#asistencia-form_idHorario").parent().closest("div").addClass("has-success");
            $("#asistencia-form_idHorario").parent().closest("div").removeClass("has-error");
        }else{
            $("#asistencia-form_idHorario").parent().closest("div").removeClass("has-success");
            $("#asistencia-form_idHorario").parent().closest("div").addClass("has-error");
        }
        if(retornar == true){
            $("#loading").addClass("loading");
            $("body").css("cursor", "progress");
        }else{
            $("#resultado").html("");
            return false;
        }
    };//fin validarForm()
    
    antesDeEnviar = function(){
        if ( $(':radio:checked').length != $('#listaAprendices_nAprendices').val() ) {
            alert("Hay aprendices pendientes por marcar asistencia." );
            event.preventDefault();
        }else{
            $('#listaAprendices_form').submit();
        }
    };
    
   
})(jQuery);