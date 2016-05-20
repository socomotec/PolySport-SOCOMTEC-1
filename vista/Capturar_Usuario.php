<?php

require_once('../controlador/Usuario_Controlador.php');

$Rut = $_POST['Rut'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];


insertar_usuario($Rut, $Nombre, $Apellido, $Email, $Contraseña);

 ?>