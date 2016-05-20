<?php
require_once('../controlador/Categoria_Controlador.php');

$Id_Categoria = $_POST['id_categoria'];
$Nombre_Categoria = $_POST['nombre_categoria'];


editar_categoria_controlador($Nombre_Categoria, $Id_Categoria);



 ?>