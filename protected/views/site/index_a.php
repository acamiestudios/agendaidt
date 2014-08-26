<?php
$f=Yii::app()->user->um->loadUserFields(Yii::app()->user->user);
foreach( $f as $v){
    echo $v->idfield . ' ' .  $v->fieldname .  ' ' . $v->fieldValue;
    
}
$values = array(
  'username' => 'juanito3',
  'email' => 'juanitoperez@gmail.com',
  /*'nombre' => 'Juanito',    // VALOR DE CAMPO PERSONALIZADO
  'apellido' => 'Perez',  // VALOR DE CAMPO PERSONALIZADO
  'cedula' => '1298912891',  // VALOR DE CAMPO PERSONALIZADO*/
);
//$usuario = Yii::app()->user->um->createNewUser($values);
//echo 'idUser ' . $usuario->iduser;
//print_r($usuario);
 ?>
<h3 class="text-center">Panel administrativo</h3>


