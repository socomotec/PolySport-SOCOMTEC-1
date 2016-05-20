<?php

require_once('../controlador/Usuario_Controlador.php');


$capturarRut = $_POST["rut"];

$Rut=explode("_", $capturarRut);


eliminar_usuario_bd($Rut[1]);


 ?>