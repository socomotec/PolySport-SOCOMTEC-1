<?php

require_once('../controlador/Marca_Controlador.php');

$Capturar_Marca = $_POST['id_marca'];

$Id_Marca = explode("-", $Capturar_Marca);

foreach (mostrar_especifico_marca($Id_Marca[1]) as $ListM) {
	$idMarca = $ListM['id_marca'];
	$nombreMarca = $ListM['nombre_marca'];
}


$MarcaArray = array();

$MarcaArray[0] = $idMarca;
$MarcaArray[1] = $nombreMarca;

echo json_encode($MarcaArray);

 ?>