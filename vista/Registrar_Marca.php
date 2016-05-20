<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

}


 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Registrar Marca</title>


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

		<script>
		$(document).ready(function() {

			$('#btn-marca').click(function() {

			var enviar_marca = $('#formulario_Marca').serialize();


			$.ajax({
				url: 'Capturar_Marca.php',
				type: 'POST',
				dataType: 'json',
				data: enviar_marca,
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$('#txt-marca').val('');
			});
				
			});
			
			
			
			
		}); // CERRAR FUNCTION DEL DOCUMENT

		</script>
</head>
<body>
<?php require_once('menu_administrador.php'); ?>

<div class="container">
<h1>Agregar Marca para el Producto</h1>
<hr>

	<form id="formulario_Marca">

			<div class="form-group">
				    <label for="Categoria">Nombre Marca:</label>
				    <input type="text" class="form-control" id="txt-marca"  name="nombre_marca">
			</div>

			 <input type="button" id="btn-marca" class="btn btn-primary" value="Agregar" />
		</form>


</div>



</body>
</html>