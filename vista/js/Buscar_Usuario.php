<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: index.php"); //si existe nos enviara al menu_administrador.php

}

?> 

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Lista General Ususario</title>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="css/miEstilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	    <link rel="stylesheet" tyspe="text/css" href="css/animate.css" />
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootbox.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/miEstilo.js"></script>
		

		<script type="text/javascript"> 
			$(document).ready(function() {
				$('#div_usuario').css('display','none'); //INICIAMOS EL DIV USUARIO COMO NO VISIBLE
				
				
			$('#btn-buscar').click(function() {
					var formulario = $('#buscar_usuario').serialize(); //FORMULARIO PARA BUSCAR VIENE EN FORMULARIO CON METODO SERIALIZE

					$.ajax({
						url: 'Recibe_Buscar_Usuario.php', //PASAMOS LOS DATOS A RECIBE_USUARIO.....ETC
						type: 'POST',   //TIPO DE DATO QUE VAMOS ENVIAR ENCRIPTADO
						dataType: 'json',
						data: formulario, //ESPECIFICAMOS LOS DATOS QUE VAMOS A MANDAR
					})
					.done(function(data) { //RECIBIMOS LOS DATOS DEL RECIBE BUSCAR USUARIO MEDIANTE JSON_ENCODE DENTRO DE FUNCTION((DATA)

						console.log("done");

						$('#div_usuario').css('display', 'block'); //ENVIAMOS QUE EL DIV SEA VISIBLE
						$('#btn-editar').attr("disabled", false);
						$('#txt-rut').val(data[0]); //LE PASAMOS LOS VALORES DEL ARREGLO
						$('#txt-nombre').val(data[1]);
						$('#txt-apellido').val(data[2]);
						$('#txt-email').val(data[3]);


					})
					.fail(function() { //EN EL CASO DE QUE FALLE MANDAMOS UNA ALERTA DICIENDO QUE NO ESTAN LOS REGISTROS
						bootbox.alert("EL usuario no se encuentra en el registro");
						$('#div_usuario').css('display', 'none'); //PONEMOS EL DIV COMO NO VISIBLE
						$('#buscador_rut').val(""); //INPUT BUSCADOR_RUT LO DEJAMOS EN BLANCO
					})
					.always(function() {
						console.log("complete");
						$('#txt-rut').attr('readonly', 'true'); //UNA VEZ BUSCAMOS DEJAMOS LOS ATRIBUTOS SOLO LECTURA PARA QUE NO PUEDAN CLICKEAR LOS INPUT
						$('#txt-nombre').attr('readonly', 'true');
						$('#txt-apellido').attr('readonly', 'true');
						$('#txt-email').attr('readonly', 'true');
						$('#btn-guardar').css('display', 'none');
					});
					

			}); //TERMINA LE BOTON BUSCAR


			$('#btn-eliminar').click(function() {   //boton eliminar

			 	var form_eliminar = $('#formulario_mostrar').serialize();
				  

				bootbox.dialog({
					  message: " Este usuario se eliminara permanentemente ¿Desea Eliminar a" +" "+ "<strong>"+ $('#txt-nombre').val()+"</strong> ?",
					  title: "<strong>Eliminar</strong>",
					  buttons: {
					    success: {
					      label: "Si",
					      className: "btn-primary",
					      callback: function() {
					        	$.ajax({
					        		url: 'Recibe_Eliminar_Usuario.php',
					        		type: 'POST',
					        		dataType: 'json',
					        		data: form_eliminar,
					        	}).done(function() {

									console.log("listo");
									bootbox.alert("deberia decir bien"); //mandamos alerta para que confirme que el usuario se edito
										

									}) .fail(function() {

					        		bootbox.alert("<h3>Se a Eliminado satisfactoriamente</h3>");   //alerta de eliminacion correcta
					        		$('#buscador_rut').val(''); //pasamos valores vacios al campo de buscador de rut
					        		$('#div_usuario').css('display', 'none'); //cambiamos el div a no visible

					        	});
					        	

					      }
					    },
					    danger: {     //nombramos el boton dento del dialog para el que veremos con sus funciones
					      label: "Cancelar",  //titulo del boton
					      className: "btn-danger", //clase de bootbox
					      callback: function() {
					        //lo que realizaremos dentro del boton alert
					      }
					    }
					   }
					  }); 	//SE CIERRA EL BOTON DE DIALOGO
				
				


				}); //Boton Eliminar se cierra



			$('#btn-editar').click(function() { //CLICK AL MOMENTO DE PRESIONAR EDITAR
				
				$('#btn-guardar').css('display', 'block'); //PASAMOS QUE EL BTN GUARDAR SEA VISIBLE
				$('#btn-editar').attr("disabled", "disabled"); //DESHABILITAR EL BOTON DE EDITAR PARA QUE NO LO PUEDAN PRESIONAR AGREGADO ATRIBUTOS DE DISABLED
				$('#txt-nombre').removeAttr('readonly'); //REMOVEMOS EL ATRIBUTO readonly
				$('#txt-apellido').removeAttr('readonly'); //LO MISMO
				$('#txt-email').removeAttr('readonly'); //LO MISMO

			});


				$('#btn-guardar').click(function() { //FUNCION PARA EL BOTON GUARDAR DEL EDITAR

					if( $('#txt-nombre').val().length < 1 ) //COMPARAMOS SI EL CAMPO NOMBRE ESTA VACIO
					{

						bootbox.alert("Necesita Ingresar un Nombre");

					}else{ //1 (HAY QUE CERRAR UN ELSE)

						if( $('#txt-apellido').val().length < 1 ) //EVALUAMOS SI EL APELLIDO VIENE VACIO
						{

							bootbox.alert("No ha ingresesado el Apellido"); 

						}else { // 2 (HAY QUE CERRAR EL SEGUNDO ELSE)

							 if( $("#txt-email").val().length < 1 ) //VALIDAMOS QUE EL EMAIL NO VENGA CON DATOS VACIOS
							 {

							 	bootbox.alert("El email no puede quedar vacio, ingrese email a editar");

							 }else{ //3

					var var_editar = $('#formulario_mostrar').serialize(); //CAPTURAMOS EL FORMULARIO CON SERIALIZE

					$.ajax({
						url: 'Recibe_Editar_Usuario.php', //AGREGAMOS LA URL DONDE SE DIRIGE EL DATO VAR_EDITAR
						type: 'POST', //MANERA DEL CUAL SE ENVIARA EL DATO
						dataType: 'json', //TIPO DE DATO JSON
						data: var_editar, //ESPECIFICAMOS EL DATO QUE ENVIAREMOS
					}).done(function() {

						console.log("listo");
						bootbox.alert("deberia decir bien"); //mandamos alerta para que confirme que el usuario se edito
						

					})
					.fail(function() {
						console.log("fail");
						bootbox.alert("Se Edito el Usuario el Usuario Correctamente"); //mandamos alerta para que confirme que el usuario se edito
						

					})
					.always(function() {
						$('#div_usuario').css('display', 'none'); //Que siempre se pase el div a invisible
					});
					
				     	  }	
					 }
				}

				
				});  //cierra el boton click 
    		
    


		});

		</script>
 	
 </head>
 <body>
 

 <?php require_once('menu_administrador.php'); ?>


<div class="container">

<h1>Buscar Usuario</h1>
<hr>

<form id="buscar_usuario">
	<div class="form-group">
		<label for="Rut">Rut a Buscar:</label>
		<input type="text" class="form-control" id="buscador_rut" placeholder="18763459-9" name="rut">
		<br />
		
	</div>
	<input type="button" id="btn-buscar" class="btn btn-primary" value="Buscar"  >
</form>	
<br>
	

<div id="div_usuario" class="col-xs-12">
	<form id="formulario_mostrar">
		<div class="form-group">
			<label for="Rut">Rut:</label>
			<input type="text" class="form-control" id="txt-rut" name="rut">
		</div>

		<div class="form-group">
			<label for="Rut">Nombre:</label>
			<input type="text" class="form-control" id="txt-nombre" name="nombre">
		</div>

		<div class="form-group">
			<label for="Rut">Apellido:</label>
			<input type="text" class="form-control" id="txt-apellido" name="apellido">
		</div>

		<div class="form-group">
			<label for="Rut">Email:</label>
			<input type="text" class="form-control" id="txt-email" name="email">
		</div>

	<div class="row">

		<div class="col-xs-4">
			<input type="button" class="btn btn-danger" value="Eliminar" id="btn-eliminar">

		</div>

		<div class="col-xs-4">
			 <input type="button" class="btn btn-default" value="Editar" id="btn-editar" >
		</div>

		<div class="col-xs-4">
			<input type="button" class="btn btn-warning" value="Guardar" id="btn-guardar" /> 
		</div>


	</div>	
		
		

		 

	</form>	
</div>

	



</div>

 
 

 </body>
 </html>








