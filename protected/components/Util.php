<?php
class Util{
    public function getDia($cod){
        switch($cod){
            case 0:
                $dia='Domingo';
                break;
            case 1:
                $dia='Lunes';
                break;
            case 2:
                $dia='Martes';
                break;
            case 3:
                $dia='Miércoles';
                break;
            case 4:
                $dia='Jueves';
                break;
            case 5:
                $dia='Viernes';
                break;
            case 6:
                $dia='Sábado';
                break;
            case 7:
                $dia='Domingo';
                break;
            default:
                $dia='Error';
                break;
        }
        return $dia;
    }
}