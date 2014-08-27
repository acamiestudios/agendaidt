    function CheckTime(str){ 
        hora=str.value; 
        if (hora=="") { 
            alert("Debes digitar la hora. Ej. 08:30 en " + str.id);
            return; 
        } 
        if (hora.length>5) { 
            alert("Introdujo una cadena mayor a 5 caracteres en " + str.id); 
            return; 
        } 
        if (hora.length!=5) { 
            alert("Introducir la hora en formato HH:MM en " + str.id); 
            return; 
        } 
        a=hora.charAt(0); //<=2 
        b=hora.charAt(1); //<4 
        c=hora.charAt(2); //: 
        d=hora.charAt(3); //<=5 
        e=hora.charAt(5); //: 
        f=hora.charAt(6); //<=5 
        if ((a==2 && b>3) || (a>2)) { 
            alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23 en " + str.id); 
            return; 
        } 
        if (d>5) { 
            alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59 en " + str.id); 
            return; 
        } 
        //if (f>5) { 
        //    alert("El valor que introdujo en los segundos no corresponde en " + str.id); 
        //    return; 
        //} 
        if (c!=":") { 
            alert("Introduzca el caracter : para separar la hora, los minutos y los segundos en " + str.id); 
            return; 
        } 
    }

    function detectarEspacios(str){
        if (/\s/.test(str.value)) { 
            if( !$('div.errorMessage').length ) {
                document.getElementById("checkVal").innerHTML="No se permiten espacios en blanco.";
            }
        }
       /* if( $('div.errorMessage').length ) {
            alert("wi" + $('div.errorMessage').length);
        }
        /*if ($(".errorMessage")[1]){
             alert("wi");
        }else{
            if (/\s/.test(str.value)) { 
//                document.getElementById("errorMessage").innerHTML="<div class='errorMessage'>No se permiten espacios en blanco.</div>";
            }else{
//                document.getElementById("errorMessage").innerHTML="";
            }
        }*/
    }
