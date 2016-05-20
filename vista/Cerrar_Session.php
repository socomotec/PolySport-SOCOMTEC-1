<?php
session_start();

$_SESSION['usuario'] = array();

session_destroy();

header("location: ./Menu_Vista_Producto.php");


 ?>