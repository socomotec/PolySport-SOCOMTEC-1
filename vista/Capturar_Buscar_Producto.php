<?php

require_once('../controlador/Producto_Controlador.php');


$Id_Separar = $_POST['producto'];

$Id_Producto = explode("-", $Id_Separar);

foreach (producto_especifico($Id_Producto[1]) as $ListP) {

	$idproducto = $ListP['id_producto'];
	$nombreproducto = $ListP['nombre_producto'];
	$categoriaproducto = $ListP['id_categoria'];
	$descripcionproducto = $ListP['descripcion'];
	$precioproducto = $ListP['precio'];
	$marcaproducto = $ListP['id_marca'];
	$urlproducto = $ListP['url_producto'];
	$imgproducto = $ListP['nombre_img'];
}

$ProductoArray = array();

$ProductoArray[0] = $idproducto;
$ProductoArray[1] = $nombreproducto;
$ProductoArray[2] = $categoriaproducto;
$ProductoArray[3] = $descripcionproducto;
$ProductoArray[4] = $precioproducto;
$ProductoArray[5] = $marcaproducto;
$ProductoArray[6] = $urlproducto;
$ProductoArray[7] = $imgproducto;

echo json_encode($ProductoArray);

?>