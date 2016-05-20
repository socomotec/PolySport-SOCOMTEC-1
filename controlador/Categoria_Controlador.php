<?php
require_once('../modelo/Categoria_Modelo.php');

function agregar_categoria($nombre_categoria)
{

	$Tipo = new Categoria();
	$Tipo->insertar_categoria($nombre_categoria);

}

function lista_categoria()
{

	$Tipo = new Categoria();
	$datos = $Tipo->mostrar_todos_categoria();

	return $datos;

}

function lista_categoria_especifica($Id_Categoria)
{

	$Tipo = new Categoria();
	$datos = $Tipo->mostrar_especifica_categoria($Id_Categoria);

	return $datos;

}

function editar_categoria_controlador($Nombre_Categoria, $Id_Categoria)
{

	$Tipo = new Categoria();
	$Tipo->editar_categoria($Nombre_Categoria, $Id_Categoria);

}

function eliminar_categoria_controlador($Id_Categoria)
{
	$Tipo = new Categoria();
	$Tipo->eliminar_categoria($Id_Categoria);

}


 ?>