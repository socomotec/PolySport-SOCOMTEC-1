<?php
require_once('../controlador/Categoria_Controlador.php');

$id_categoria = $_POST['id_categoria']; //capturamos la id_categoria

$id_separador = array();
$id_separador = explode("-", $id_categoria); //separamos la id

eliminar_categoria_controlador($id_separador[1]);


?>