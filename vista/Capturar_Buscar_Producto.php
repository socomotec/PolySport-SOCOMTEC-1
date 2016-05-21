<?php

require_once('../controlador/Producto_Controlador.php');

$Id_Separar = $_POST['id_producto'];

$Id_Producto = explode("-", $Id_Separar);

foreach (producto_especifico($Id_Producto) as $ListP) {

	hola seba gay

}

$ProductoArray = array();

$ProductoArray[0] = $idproducto;
$ProductoArray[1] = $nombreproducto;

echo json_encode($ProductoArray);

?>