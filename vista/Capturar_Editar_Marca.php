<?php
require_once('../controlador/Marca_Controlador.php');

$Id_marca = $_POST['id_marca'];
$Nombre_Marca = $_POST['nombre_marca'];




editar_marca($Nombre_Marca, $Id_marca);

 ?>