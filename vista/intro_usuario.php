<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: ../index.php"); //si existe nos enviara al menu_administrador.php

}



 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Registrar Usuario</title>


	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/miEstilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	    <link rel="stylesheet" type="text/css" href="css/animate.css" />
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />

		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootbox.min.js"></script>
		<script src="js/jquery-ui.js"></script>
 </head>
 <body>

<?php require_once('menu_administrador.php'); ?>
 <div class="container">
 	<div class="jumbotron">
 		<h1>hola</h1>


 	</div>


 </div>
 


 </body>
 </html>