<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

}

 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Registrar Categoria</title>


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

			$('#btn-enviar_categoria').click(function() {
				
				var form = $('#formulario_categoria').serialize();

				$.ajax({
					url: 'Capturar_Categoria.php',
					type: 'POST',
					dataType: 'json',
					data: form,
				})
				.done(function() {
					
				})
				.fail(function() {
					
				})
				.always(function() {
					$('#txt-nombre_categoria').val("");
					bootbox.alert("Categoria Guardada");
				});
				


			}); //Cerramos la funcion click del enviar
			

		}); //Cierra la funcion


		</script>
</head>
<body>

<?php require_once('menu_administrador.php'); ?>

<div class="container">
<h1>Registrar Categoria de los Productos</h1>
<hr>

	<form id="formulario_categoria">

			<div class="form-group">
				    <label for="Categoria">Nombre Categoria:</label>
				    <input type="text" class="form-control" id="txt-nombre_categoria"  name="nombre_categoria">
			</div>

			 <input type="button" id="btn-enviar_categoria" class="btn btn-primary" value="Agregar" />
		</form>


</div>
		
</body>
</html>