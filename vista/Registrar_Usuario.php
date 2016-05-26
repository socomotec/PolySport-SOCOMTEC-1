<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

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
		




<script type="text/javascript">

		$(document).ready(function() {
			
		 document.getElementById('dialog').style.display='none';  //ponemos el error como  no visible			
				
		$('#enviar_form').click(function() {   //funcion que se activa cuando le damos click a la id del formulario

				if( $('#txt-rut').val().length < 1)  //valida length RUT

					{
							bootbox.alert('El Campo Rut esta vacio');

						}else{ 
							
							

							if(Valida_Rut($('#txt-rut').val())){

								
							
							
							if( $('#txt-nombre').val().length < 1 ) { //valida length NOMBRE
 
									bootbox.alert('EL Nombre no tiene valores');

						 	}else{
						 	   if( $('#txt-apellido').val().length < 1) { //VALIDA APPELIDO

						 		bootbox.alert('El campo Apellido esta vacio');

						 	}else{   
						 		if( $('#txt-email').val().length < 1) { //VALIDA EMAIL

						 			bootbox.alert('Falta indicar su email');

						 	}else{  
						 		if( $('#txt-pass').val().length <= 4) { //VALIDA EL PASSWORD

						 			bootbox.alert('<strong>Complete la contraseña correctamente</strong> (tiene que tener mas de 5 digitos)');

						 				$('#txt-pass').val(''); //DEJAMOS CONTRASEÑA EN BLANCO
										$('#txt-pass2').val('');

						 	}else{
								if( $('#txt-pass').val() != $('#txt-pass2').val() ) { //confirmamos si las contraseñas son iguales

									 document.getElementById('dialog').style.display='block'; //hacemos la alerta visible

									$('#txt-pass').val(''); //DEJAMOS CONTRASEÑAS EN BLANCO
									$('#txt-pass2').val(''); 

							 }else{


										var todos_datos = $('#form_registra').serialize(); //UTILIZAMOS SERIALIZE PARA GUARDAR DATOS

											$.ajax({                             //INICAMOS AJAX
											url: 'Capturar_Usuario.php',		//DIRECCIOND E LOS DATOS
											type: 'POST',						//METHOD POR MEDIO DE POST
											dataType: 'json',					//TIPO DE DATO JSON
											data: todos_datos,					//NOMBRE DE LA VARIABLE SERIALIZE
											});
									
									
											bootbox.alert("<h2>Felicidades! a Registrado un nuevo Usuario</h2>", function() {   //Alerta clase bootbox

											$('#txt-rut').val('');
											$('#txt-nombre').val('');
											$('#txt-apellido').val('');    //dejamos en blanco una vez que se registra
											$('#txt-email').val('');
											$('#txt-pass').val('');
											$('#txt-pass2').val('');
										  
											}); //Cerramos ajax


								  }	
								}
							  }
						    }
						  }
						  }			
						}	

			});  //Termina la funcion del click
			
			function Valida_Rut( Objeto ){
	var tmpstr = "";
	var intlargo = Objeto;
	if (intlargo.length> 0)
	{
		crut = Objeto;
		largo = crut.length;
		if ( largo <2 )
		{
			bootbox.dialog({
  									message: "¡El RUN ingresado no es válido!",
  									title: "Alerta",
  									buttons: {
    									success: {
      									label: "OK",
      									className: "btn-primary",
      										callback: function() {
        									document.location.reload();
      									}
    								}
    							 	},
								});
			return false;
		}
		for ( i=0; i <crut.length ; i++ )
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
		{
			tmpstr = tmpstr + crut.charAt(i);
		}
		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
 
		if ( largo> 2 )
			rut = crut.substring(0, largo - 1);
		else
			rut = crut.charAt(0);
 
		dv = crut.charAt(largo-1);
 
		if ( rut == null || dv == null )
		return 0;
 
		var dvr = '0';
		suma = 0;
		mul  = 2;
 
		for (i= rut.length-1 ; i>= 0; i--)
		{
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
				mul = 2;
			else
				mul++;
		}
 
		res = suma % 11;
		if (res==1)
			dvr = 'k';
		else if (res==0)
			dvr = '0';
		else
		{
			dvi = 11-res;
			dvr = dvi + "";
		}
 
		if ( dvr != dv.toLowerCase() )
		{
			bootbox.dialog({
  									message: "¡El RUN ingresado no es válido!",
  									title: "Alerta",
  									buttons: {
    									success: {
      									label: "OK",
      									className: "btn-primary",
      										callback: function() {
        									document.location.reload();
      									}
    								}
    							 	},
								});
			
			return false;
		}
		
		return true;
	}
}
		});


	</script>


</head>
<body>

<?php include('menu_administrador.php') ?>


<div class="container">

<h1>Registrar Usuario</h1>
<hr>

	<div class="alert alert-danger alert-dismissible" id="dialog" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>ERROR!</strong> Las Contraseñas no coinciden.
	</div>  <!-- cambo de la alerta -->


			<form  id="form_registra">

				 <div class="form-group">
				    <label for="Nombre">Run:</label>
				    <input type="text" class="form-control" id="txt-rut" placeholder="8888888-8" name="Rut">
				  </div>


				  <div class="form-group">
				    <label for="Nombre">Nombre:</label>
				    <input type="text" class="form-control" id="txt-nombre" placeholder="Nombre" name="Nombre">
				  </div>

				  <div class="form-group">
				    <label for="Nombre">Apellido:</label>
				    <input type="text" class="form-control" id="txt-apellido" placeholder="Apellido" name="Apellido">
				  </div>
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" id="txt-email" placeholder="Email" name="Email">
				  </div>

				  <div class="form-group">
				    <label for="contraseña1">Contraseña:</label>
				    <input type="password" class="form-control" id="txt-pass" placeholder="Contraseña" name="Contraseña">
				  </div>

				  <div class="form-group">
				    <label for="contraseña2">Repetir Contraseña:</label>
				    <input type="password" class="form-control" id="txt-pass2" placeholder="Repetir Contraseña">
				  </div>


				<input type="button" id="enviar_form" class="btn btn-primary" value="Registrar">
				<input type="button" class="btn btn-default" value="Volver" onClick=" window.location.href='index.php' ">
				

			</form>
		</div>	


</form>


</body>


</html>

