<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

  header("location: ../index.php"); //si existe nos enviara al menu_administrador.php

}

require_once('../controlador/Producto_Controlador.php');


 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Lista General Producto</title>


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

		<script>
		$(document).ready(function() {
			
			var listasProducto = "";
			var Arreglo = new Array();
			var contador = 0;
			var incrementador = -1; //INCREMENTADOR PARA EL ARREGLO
			arre = []; //DEFINIMOS EL ARREGLO
			
			

			<?php foreach (lista_general_producto() as $ListP) {?> 
				
				

		 			 listasProducto = ("<?php echo $ListP['nombre_producto']; ?>");
  		 			 Arreglo[contador] = listasProducto;
  		 			 contador++;

  		 	 <?php }?> 

  		 	

						$('#txt-busquedad').autocomplete({
					 	
							source:Arreglo
							
				
						});



			<?php foreach (lista_general_producto() as $ListC) { ?> //PASAMOS METODO LISTA DE PRODUCTO
 		  		incrementador += 1;
 		  		var Prueba_php = [ <?php echo $ListC['id_producto']; ?> ]; //VALORES QUE LE VAMOS A PASAR AL ARREGLO

 		  	
 		  		arre[incrementador] = Prueba_php; //GUARDAMOS LOS VALORES DENTRO DEL ARREGLO QUE SE RECORRE SOLO

  		  	
		  <?php } ?>
								
  		 	
  		 	for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
		{


			$("#eliminar-"+arre[i]).click(function() { //CREAMOS UNA FUNCION DE UN CLICK DENTRO DEL FOR PARA CAPTURAR LA LISTA
         	  

         		var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID
         		var formudato = new FormData();
         		formudato.append('id_producto', tribut);


         		bootbox.dialog({
						  message: "¿Desea eliminar el Producto?",
						  title: "Eliminacion de Producto",
						  buttons: {
						    primary: {
						      label: "Confirmar",
						      className: "btn-primary",
						      callback: function() {
						        
						      	 $.ajax({
										async: false,
										type: 'POST',
										url: 'Capturar_Eliminar_Producto.php',
										data: formudato, 
										contentType:false,
										processData:false,
										dataType: 'json',
										
										
									  })
									  .done(function() {


										 
									 });

									  window.location.reload(true);
									  

						      }
						    },
						    danger: {
						      label: "Cancelar",
						      className: "btn-danger",
						      callback: function() {
						        
						      }
						    }
						   }
						});	


         	});



				$("#editar-"+arre[i]).click(function(event) {
					
						alert("prueba");

				});
		

		}
	

				

		});

		</script>


</head>
 <body>
<?php require_once('menu_administrador.php'); ?>

	<div class="container">
		<h1>Lista de Productos</h1>

		 
		  		<label for="busquedad">Buscar: </label>
		  		<input id="txt-busquedad">
		

		<hr>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading"> <i class="fa fa-list-alt"></i>  <strong> LISTA DE PRODUCTOS</strong> </div>
		  	

		  <!-- Table -->
			  	<table class="table table-condensed table-hover">

					  	<tr>
					    	<td><strong> Nombre </strong> </td>
					    	
					    	<td><strong> Precio </strong></td>

					    	<td><strong> Modificar</strong></td>

		      				<td><strong> Ver </strong></td>
					        

					    </tr>

					<?php foreach (lista_general_producto() as $ListP) { ?>
					<tr>	
						
						<td><?php echo $ListP['nombre_producto']; ?> </td>
						
						<td> <?php echo $ListP['precio']; ?> </td>

						<td><input type="button" class="btn btn-danger" id="<?php echo 'eliminar-'.$ListP['id_producto'];  ?>" value="Eliminar" />
						<input type="button" class="btn btn-default" id="<?php echo 'editar-'.$ListP['id_producto'];  ?>" value="Editar" /></td>
						<td><button class="btn btn-primary" onclick="window.location.href='<?php echo $ListP['url_producto'].$ListP['nombre_img']; ?>'" /> Ver Imagen</button></td>

					</tr>
					<?php } ?>

				</table>
			
			</div>
		</div>
	</div>

	</div>

	<div id="edicion">
		


	</div>


</body>
</html>