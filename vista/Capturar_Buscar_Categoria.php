<?php

require_once('../controlador/Categoria_Controlador.php');


$Id_Categoria = $_POST['id_categoria'];
$Id_Separador = array();

$Id_Separador = explode("-", $Id_Categoria);



//lista_categoria_especifica($Id_Separador[1]);

foreach (lista_categoria_especifica($Id_Separador[1]) as $ListC) {
	$idcategoria = $ListC["id_categoria"];
	$nombrecategoria = $ListC["nombre_categoria"];


}


$CategoriaArray = array();



$CategoriaArray[0] = $idcategoria;
$CategoriaArray[1] = $nombrecategoria;

echo json_encode($CategoriaArray);

 ?>