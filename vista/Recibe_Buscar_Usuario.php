<?php
require_once('../controlador/Usuario_Controlador.php');
$capturarRut = $_POST['rut']; //CAPTURAMOS LOS DATOS POR MEDIO DE POST DE BUSCAR_USUARIO.HTML

$Rut = explode("_", $capturarRut);


$Array_Usuario = array(); // CREAMOS UN ARRRAY PARA GUARDAR VARIABLES DE DISTINTO TIPOS

$Array_Usuario[0] = buscar_especifico_usuario($Rut[1])[0]["rut"]; //TRAEMOS EL RUT DEL METODO BUSCAR_ESPECIFICO Y LO GUARDAMOS EN EL ARRAY EN LA POSICION 0
$Array_Usuario[1] = buscar_especifico_usuario($Rut[1])[0]["nombre"];
$Array_Usuario[2] = buscar_especifico_usuario($Rut[1])[0]["apellido"];
$Array_Usuario[3] = buscar_especifico_usuario($Rut[1])[0]["email"];	




echo json_encode($Array_Usuario); //DEVOLVEMOS LA VARIABLE DE ARREGLO ARRAY_USUARIO PARA PODER LAMARLA EN LA VISTA






 ?>