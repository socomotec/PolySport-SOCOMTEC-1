<?php
require_once('../modelo/Producto_Modelo.php');



function agregar_producto($url_producto, $nombre_producto, $nombre_imagen, $id_categoria, $descripcion, $precio, $fecha_subida, $id_marca)
{
	$Prducto = new Producto();
	$Prducto->insertar_producto($url_producto, $nombre_producto, $nombre_imagen, $id_categoria, $descripcion, $precio, $fecha_subida, $id_marca);


}

function producto_categoria($Id_categoria)
{
$Prducto = new Producto();
$mostrar = $Prducto->mostrar_productos_categoria2($Id_categoria);

return $mostrar;

}

function lista_general_producto()
{
	$Prducto = new Producto();
	$mostrar =$Prducto->mostrar_todos_productos();

	return $mostrar;
}

function eliminar_producto_controlador($Id_Producto){

	$Prducto = new Producto();
	$Prducto->eliminar_producto($Id_Producto);

}

function producto_especifico($Id_Producto){

	$Prducto = new Producto();
	$mostrar = $Prducto->buscar_especifico_producto($Id_Producto);

	return $mostrar;
}

function mostrar_por_fechas(){

	$Prducto = new Producto();
	$datos = $Prducto->mostrar_productos_fechas();

	return $datos;
}

 ?>