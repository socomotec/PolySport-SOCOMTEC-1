<?php

//require_once('/controlador/Producto_Controlador.php');
/*session_start();

if(isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	session_destroy();

	header("location: index.php"); //si existe nos enviara al menu_administrador.php


}*/


 ?>

<!DOCTYPE html>

<html>
<head lang="es">
	<title>Inicio</title>
	<link rel="shortcut icon" href="favicon.ico" />

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="vista/css/miEstilo.css">
		<link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="vista/css/font-awesome.min.css" />
	    <link rel="stylesheet" tyspe="text/css" href="vista/css/animate.css" />
	    <link rel="stylesheet" type="text/css" href="vista/css/jquery-ui.css" />
		<script src="vista/js/jquery-1.11.3.min.js"></script>
		<script src="vista/js/bootstrap.min.js"></script>
		<script src="vista/js/bootbox.min.js"></script>
		<script src="vista/js/jquery-ui.js"></script>
		<script src="vista/js/miEstilo.js"></script>


		<script type="text/javascript">
		$(document).ready(function() {

				$('#user-inicio').hide();
				$('#home-productos').hide();
				$('#logo').addClass('animated flip');
				$('#session').hide();




			
 		$('#enviar_session').click(function() {
 		
 		var sesionUsuario = $('#formulario_session').serialize();

 		$.ajax({
 			url: 'vista/Capturar_Inicio_Sesion.php',
 			type: 'POST',
 			dataType: 'json',
 			data: sesionUsuario,
 		})
 		.done(function(datos) {
 			if(datos=="verdadero")
 			{
 				window.location.href="vista/intro_usuario.php";
 			}else{

 				alert("La contraseña o el Usuario es Incorrecto");
 			}

 		})
 		.fail(function() {
 			alert("error");
 		})
 		.always(function() {
 			
 		});
 		




 		});



 		$(window).scroll(function(event) {

 			var Barra = $(this).scrollTop();

 			if( Barra > 150){

 				$('#btn-iniciar').hide('700', function() 
 					{
						$('#user-inicio').show();
				
					
				 	});

				$('#btn-iniciar').addClass('animated tada');
				$('#btn-iniciar').val();


					$('#btn-productos').hide('700', function() 
						{
							$('#home-productos').show();
								
						});
					$('#btn-productos').addClass('animated tada');
					$('#btn-productos').val();

	 				}


 		});


});



		</script>
</head>
<body>

<!-- Primera Imagen -->
		<div class="container-fluid img-responsive" id="index">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12">
					<a id="logo"></a>
				</div>

			</div>

			

			<div class="row" id="footer-btn">
			
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
					<input type="button" class="btn btn-primary btn-lg" id="btn-iniciar" value="Iniciar Sesion" data-toggle="modal" data-target="#inicio_ses">
					<a href="" id="user-inicio" data-toggle="modal" data-target="#inicio_ses"><i class="fa fa-user fa-4x"></i></a>	
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				 <input type="button" class="btn btn-default btn-lg" id="btn-productos" value="Pagina Principal" onclick="window.location.href='vista/Menu_Vista_Producto.php'">
				 <a href="vista/Menu_Vista_Producto.php" id="home-productos"><i class="fa fa-home fa-4x"></i></a>	
				</div>
				

			</div>
		</div>

<!--segunda imagen -->
		<div class="container-fluid" id="index2">
				
				<div class="row" id="carrusel">
						<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7">
							
				</div>

						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-5" style="color:white"> <!--Segunda columnda-->
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>		




				</div> <!--cerrramos el row -->


			<div class="row" id="footer-row2"><!-- Abrimos la segunda fila de los datos -->

			<hr/>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href=""><i class="fa fa-whatsapp fa-3x"></i></a>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 <a href="www.google.cl"><i class="fa fa-facebook-square fa-3x"></i></a>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
				<a href=""><i class="fa fa-phone fa-3x"></i></a>

				</div>

						
			</div>	


		</div>

				<div class="modal fade" id="inicio_ses">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Iniciar Sesion</h4>
				      </div>
				      <div class="modal-body">

				      	<form id="formulario_session">
				      	 <div class="input-group">
    						  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope-o fa-fw"> </i></span>
   							 <input type="email" class="form-control" name="txt-email" id="exampleInputEmail1" placeholder="Email">
  						 </div>

  						 <br/>

  						 <div class="input-group">
    						  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key"></i></span>
   							 <input type="password" class="form-control" name="txt-contraseña" id="exampleInputPassword" placeholder="Contraseña">
  						 </div>


				      	</form>


				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-primary" id="enviar_session">Entrar</button>
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->




</body>
</html>

