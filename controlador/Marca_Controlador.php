<?php
require_once('../modelo/Marca_Modelo.php');

function ingresar_marca($nombre_marca)
{

$mmarca = new Marca();
$mmarca->insertar_marca($nombre_marca);

}


function lista_marca()
{
$mmarca = new Marca();
$datos=$mmarca->mostrar_todos_marca();
return $datos;
}

function mostrar_especifico_marca($Id_Marca)
{

$mmarca = new Marca();
$datos=$mmarca->mostrar_especifico_marca($Id_Marca);

return $datos;

}

function eliminar_marca($Id_Marca)
{
	$mmarca = new Marca();
	$mmarca->eliminar_marca($Id_Marca);

}

function editar_marca($Nombre_Marca, $Id_marca)
{
$mmarca = new Marca();
$mmarca->editar_nombre_marca($Nombre_Marca, $Id_marca);

}
 ?>


