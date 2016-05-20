<?php

require_once('../controlador/Marca_Controlador.php');

$Capturador_Marca =$_POST['id_marca'];

$Id_Marca = array();
$Id_Marca = explode("-", $Capturador_Marca);


eliminar_marca($Id_Marca[1]);

 ?>