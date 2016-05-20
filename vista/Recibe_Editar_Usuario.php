<?php
	require_once('../controlador/Usuario_Controlador.php');

	$Rut = $_POST["rut"];
	$Nombre = $_POST["nombre"];
	$Apellido = $_POST["apellido"];
	$Email = $_POST["email"];

editar_usuario_bd($Rut, $Nombre, $Apellido, $Email);




 ?>