<?php

require_once('../controlador/Producto_Controlador.php');

$Id_Separar = $_POST['id_producto'];

$Id_Producto = explode("-", $Id_Separar);



foreach (producto_especifico($Id_Producto[1]) as $listEliminar) {

	$Ruta = $listEliminar['url_producto'];
	$Nombre_img = $listEliminar['nombre_img'];
	
}


eliminar_producto_controlador($Id_Producto[1]);
unlink($Ruta.$Nombre_img);







 ?>