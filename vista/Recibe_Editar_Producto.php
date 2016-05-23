<?php

	require_once('../controlador/Producto_Controlador.php');

	$id_producto = $_POST["id_producto"];
	$nombre_producto = $_POST["nombre_producto"];
	$marca_producto = $_POST["slc_marca"];
	$categoria_producto = $_POST["slc_categoria"];
	$precio_producto = $_POST["precio_producto"];
	$descripcion_producto = $_POST["descripcion"];

	$respuesta = "No";

	if(editar_producto($id_producto, $nombre_producto, $marca_producto, $categoria_producto, $precio_producto, $descripcion_producto)){

	$respuesta = "No";

	}else{

	$respuesta = "Si";

	}

	echo json_encode($respuesta)

 ?>