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
		<!--<script src="vista/js/jquery-ui.js"></script>-->
		<script src="vista/js/miEstilo.js"></script>


		<script type="text/javascript">
		$(document).ready(function() {

				$('#user-inicio').hide();
				$('#home-productos').hide();
				$('#logo').addClass('animated flip');
				$('#logo2').addClass('animated flip');
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

 			/*if( Barra > 150){

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

	 				}*/


 		});

 		$('[data-toggle="tooltip"]').tooltip();


 		/*ENVIAR CORREOS*/

 		$('#btn_correo').click(function() {

 			if( $('#nombre_correo').val() == "" ){

 				bootbox.alert("<strong>Agregar el Nombre del Contacto</strong>");

 			}else{
 				if( $('#email_correo').val() == "" ){

 						bootbox.alert("<strong>Agregar el Correo del Contacto</strong>");

 				  }else{
 				  	  if( $('#asunto_correo').val() == "" ){

 				  	  	  bootbox.alert("<strong>Agregar Asunto del Correo</strong>");

 				  	   }else{
 		

 			var datos_enviar = new FormData();

 			datos_enviar.append('nombre_correo', $('#nombre_correo').val()  );
 			datos_enviar.append('email_correo', $('#email_correo').val() );
 			datos_enviar.append('asunto_correo', $('#asunto_correo').val() );
 			datos_enviar.append('texto_correo', $('#texto_correo').val() );

 			$.ajax({
					async: false,
					type: 'POST',
					url: 'vista/Recibe_Correo.php',
					data: datos_enviar, 
					contentType:false,
					processData:false,
					
					
				  }).done(function(datos) {
				bootbox.alert("El correo ha sido enviado " + datos); 	
 				console.log("success");

 			 	$('#nombre_correo').val('');
 			 	$('#email_correo').val('');
 			 	$('#asunto_correo').val('');			
 			 	$('#texto_correo').val('');
 			});
				}
			}
		}

 			 

 		});


 		$('#btn_correo2').click(function() {
 			
 			if( $('#nombre_correo').val() == "" ){

 				bootbox.alert("<strong>Agregar el Nombre del Contacto</strong>");

 			}else{
 				if( $('#email_correo').val() == "" ){

 						bootbox.alert("<strong>Agregar el Correo del Contacto</strong>");

 				  }else{
 				  	  if( $('#asunto_correo').val() == "" ){

 				  	  	  bootbox.alert("<strong>Agregar Asunto del Correo</strong>");

 				  	   }else{


 			var datos_enviar = new FormData();

 			datos_enviar.append('nombre_correo', $('#nombre_correo').val()  );
 			datos_enviar.append('email_correo', $('#email_correo').val() );
 			datos_enviar.append('asunto_correo', $('#asunto_correo').val() );
 			datos_enviar.append('texto_correo', $('#texto_correo').val() );

 			$.ajax({
					async: false,
					type: 'POST',
					url: 'vista/Recibe_Correo.php',
					data: datos_enviar, 
					contentType:false,
					processData:false,
					
					
				  }).done(function(datos) {
				bootbox.alert("El correo ha sido enviado " + datos); 	
 				console.log("success");

 			 	$('#nombre_correo').val('');
 			 	$('#email_correo').val('');
 			 	$('#asunto_correo').val('');			
 			 	$('#texto_correo').val('');
 			});

				}
			}
		}
 			 

 		});




});



		</script>
</head>
<body>

<!-- Primera Imagen -->
		<div class="container-fluid img-responsive" id="index">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 hidden-xs " >
					 <a id="logo"></a>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 visible-xs " >
					 <a id="logo2"></a>
				</div>

			</div>

			

			<div class="row" id="footer-btn">
			
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
					<input type="button" class="btn btn-primary btn-lg" id="btn-iniciar" value="Iniciar Sesion" data-toggle="modal" data-target="#inicio_ses">
						
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				 <input type="button" class="btn btn-default btn-lg" id="btn-productos" value="Pagina Principal" onclick="window.location.href='vista/Menu_Vista_Producto.php'">
				 
				</div>
				

			</div>
		</div>

<!--segunda imagen -->
		<div class="container-fluid" id="index2">
				
				<div class="row" style="margin-top:100px">
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7">

						<div class="embed-responsive embed-responsive-16by9">
  							<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.6636123879143!2d-70.8026176847978!3d-33.562115280742084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662dd84ac2ffcc1%3A0x4b3fe26170861919!2sEl+Trebol+741%2C+Padre+Hurtado%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses-419!2scl!4v1464988118018" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>

						
							
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-5 visible-md visible-lg"> <!--Segunda columnda-->
							
							<strong>
								Nuestra empresa esta ubicada en av. El Trebol 741, Padre Hurtado,
							 Región Metropolitana para mas información síguenos en Facebook, 
							 contáctanos por Whatsapp o puedes comunicarte a nuestro teléfono. 
							</strong>

							<hr>
							
							
								<div class="row">
									<div class="col-xs-4">
										<a href="" data-toggle="tooltip" data-placement="bottom" title="Whatsapp: +569-63200980"><i class="fa fa-whatsapp fa-3x" id="icono_informacion"></i></a>
									</div>

									<div class="col-xs-4">
										 <a href="https://www.facebook.com/Polysport-827539447352809/info/?tab=page_info" data-toggle="tooltip" data-placement="bottom" title="Siguenes en Facebook"><i class="fa fa-facebook-square fa-3x" id="icono_informacion"></i></a>
									</div>

									<div class="col-xs-4">
										 <a href="" data-toggle="tooltip" data-placement="bottom" title="Telefono: 228112428"><i class="fa fa-phone fa-3x" id="icono_informacion" ></i></a>
									</div>


								</div>

								<h3>Envianos un email</h3>

								<div class="row">
									<div class="col-xs-8 col-xs-offset-2">
										<form id="correo">
												<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Nombre</span>
								   					<input type="text" class="form-control" name="nombre_correo" id="nombre_correo" placeholder="Nombre">
								  				</div>

								  				<br>

								  				<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Email</span>
								   					<input type="text" class="form-control" name="email_correo" id="email_correo" placeholder="Ingresa tu Email">
								  				</div>

								  				<br>

								  				<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Asunto</span>
								   					<input type="text" class="form-control" name="asunto_correo" id="asunto_correo">
								  				</div>

								  				<br>

								  				<textarea class="form-control" rows="4" name="texto_correo" id="texto_correo"></textarea>

								  				<hr/>
											
											
											<button type="button" class="btn btn-default" id="btn_correo">Enviar</button>

										</form>

									</div>
								</div>

												
						</div>		
					</div>

					<div class="row visible-xs visible-sm">
							<div class="col-xs-12 " style="margin-top:20px">
							
								<strong>
									Nuestra empresa esta ubicada en av. El Trebol 741, Padre Hurtado,
									 Región Metropolitana para mas información síguenos en Facebook, 
									 contáctanos por Whatsapp o puedes comunicarte a nuestro teléfono. 
								</strong> 

								<hr>

							</div>		

							<div class="col-xs-3 visible-sm visible-xs">
								<a href="tel:+56963200980" data-toggle="tooltip" data-placement="bottom" title="Contactanos por Whatsapp"><i class="fa fa-whatsapp fa-3x" id="icono_informacion"></i></a>
							</div>

							<div class="col-xs-3 visible-sm visible-xs">
								 <a href="https://www.facebook.com/Polysport-827539447352809/info/?tab=page_info" data-toggle="tooltip" data-placement="bottom" title="Siguenes en Facebook"><i class="fa fa-facebook-square fa-3x" id="icono_informacion"></i></a>
							</div>

							<div class="col-xs-3 visible-sm visible-xs">
						
								<a href="tel:+56228112428" data-toggle="tooltip" data-placement="bottom" title="Comunicate"><i class="fa fa-phone fa-3x" id="icono_informacion" ></i></a>

							</div>

							<div class="col-xs-3 visible-sm visible-xs">
								
								<a href="" data-toggle="modal" data-target="#contacto"><i class="fa fa-envelope-o fa-3x" id="icono_informacion"></i></a>


							</div>


						</div>

		</div> <!--cerrramos el row -->





		


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


			<div class="modal fade" id="contacto">
				  <div class="modal-dialog">
				    <div class="modal-content"> <!--ESTRUCTURA DEL MODAL-->


				      <div class="modal-header"> <!--CABECERA-->
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" style="text-align:center"> Envianos un email</h4>
				      </div>

				      <div class="modal-body"> <!--CUERPO DEL MODAL-->

				      	<form id="correo">
												<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Nombre</span>
								   					<input type="text" class="form-control" name="nombre_correo" id="nombre_correo" placeholder="Nombre">
								  				</div>

								  				<br>

								  				<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Email</span>
								   					<input type="text" class="form-control" name="email_correo" id="email_correo" placeholder="Ingresa tu Email">
								  				</div>

								  				<br>

								  				<div class="input-group">
								    				<span class="input-group-addon" id="sizing-addon1">Asunto</span>
								   					<input type="text" class="form-control" name="asunto_correo" id="asunto_correo">
								  				</div>

								  				<br>

								  				<textarea class="form-control" rows="4" name="texto_correo" id="texto_correo"></textarea>

								  				<hr/>
											
											
											

									</form>




				      </div>
				      <div class="modal-footer"> <!--PIE DE PAGINA DEL MODAL-->
				       <button type="button" class="btn btn-primary" id="btn_correo2">Enviar</button>
				        

				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->




</body>
</html>



