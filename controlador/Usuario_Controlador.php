<?php
require_once('../modelo/Usuario_Modelo.php');


function insertar_usuario($rut, $nombre, $apellido, $email, $contraseña)
{

	$User = new Usuario();
	$User->insertar($rut, $nombre, $apellido, $email, $contraseña);

}


function eliminar_usuario_bd($Rut)
{

$User = new Usuario();
$User->eliminar_usuario($Rut);

}


function editar_usuario_bd($Rut, $Nombre, $Apellido, $Email)
{

$User = new Usuario();
$User->editar_usuario($Rut, $Nombre, $Apellido, $Email);


}

function lista_general_usuario()
{

$User = new Usuario();
$datos = $User->mostrar_todos_usuarios();

return $datos;

}

function buscar_especifico_usuario($rut)
{

	$User = new Usuario();
	$datos = $User->buscar_especifico($rut);
	
	return $datos;

}

function iniciar_usuario($email, $contraseña)
{

	$User = new Usuario();
	$datos = $User->iniciar_sesion($email, $contraseña);

	return $datos;

}



 ?>