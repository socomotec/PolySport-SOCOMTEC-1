<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

}

require_once('../controlador/Categoria_Controlador.php');
 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Listado de Categorias</title>


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
		 
			var incrementador = -1; //INCREMENTADOR PARA EL ARREGLO
			arre = []; //DEFINIMOS EL ARREGLO
		 	$('#datos_marca').css('display', 'none');
		  
		
 		  <?php foreach (lista_categoria() as $ListC) { ?> //PASAMOS METODO LISTA DE CATEGORIA
 		  	incrementador += 1;
 		  	var Prueba_php = [ <?php echo $ListC['id_categoria']; ?> ]; //VALORES QUE LE VAMOS A PASAR AL ARREGLO

 		  	
 		  	arre[incrementador] = Prueba_php; //GUARDAMOS LOS VALORES DENTRO DEL ARREGLO QUE SE RECORRE SOLO

 		  	


 		  	
		  <?php } ?>

		  
		for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
		{


			$("#eliminar-"+arre[i]).click(function() { //CREAMOS UNA FUNCION DE UN CLICK DENTRO DEL FOR PARA CAPTURAR LA LISTA
         	  

         		var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID

         		var datos = new FormData();
         		datos.append('id_categoria', tribut);
         		 
         		 //console.log( $("#"+tribut).text() ); //SELECCIONAMOS LO QUE ESTA EN EL ID 

         		  bootbox.dialog({
						  message: "¿Desea eliminar la Categoria?",
						  title: "Eliminacion de categoria",
						  buttons: {
						    primary: {
						      label: "Confirmar",
						      className: "btn-primary",
						      callback: function() {
						        
						      	 $.ajax({
										async: false,
										type: 'POST',
										url: 'Capturar_Eliminar_Categoria.php',
										data: datos, 
										contentType:false,
										processData:false,
										
										
									  })
									  .done(function() {

									  
										 
									 });

									



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



		}	  


         	for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
		{


			$("#editar-"+arre[i]).click(function() {

				$('#datos_marca').css('display', 'block');
				var tribut = $(this).attr("id");
				

				var formu = new FormData();
				formu.append('id_categoria', tribut);



				$.ajax({
					async: false,
					type: 'POST',
					url: 'Capturar_Buscar_Categoria.php',
					data: formu, 
					contentType: false,
					processData: false,
					dataType: 'json',

					
					
				  })
				  .done(function(datos) {  
					 
				  	$('#txt-id_marca').val(datos[0]);
				  	$('#txt-nombre').val(datos[1]);
				  	$('#txt-id_marca').attr('readonly', true);


				 });
				

				

			});

		}	

			$('#btn-guardar').click(function() {
				var formuGuardar = $('#formu_editar').serialize();

				$.ajax({
					url: 'Capturar_Editar_Categoria.php',
					type: 'POST',
					dataType: 'json',
					data: formuGuardar,
				})
				.done(function() {
					console.log("success");
				})
				.always(function() {
					bootbox.alert('Se guardo exitosamente');
					$('#txt-id_marca').val("");
				  	$('#txt-nombre').val("");
				  	$('#datos_marca').css('display', 'none');

				});
				


			});




		});



		</script>
 <body>
 <?php require_once('menu_administrador.php'); ?>

 <div class="container">

 <h1>Listado de Categorias</h1>
<br>

<div class="panel panel-default">
  <!-- Default panel contents -->
  	<div class="panel-heading"> <i class="fa fa-list-alt"></i>  <strong> LISTA DE CATEGORIAS</strong> </div>
   <table class="table table-condensed table-hover">
    <tr>
    	<td><strong>Categorias</strong> </td>
    	<td><strong>Modificar</strong> </td>  	
    </tr>

<?php foreach (lista_categoria() as $ListC) {?>

	<tr>
	<td><?php echo $ListC['nombre_categoria']; ?></td>
	
	<td><input type="button" id="<?php echo 'eliminar-'.$ListC['id_categoria']; ?>"  value="Eliminar" class="btn btn-danger" /> <input type="button" id="<?php echo 'editar-'.$ListC['id_categoria']; ?>"  value="Editar" class="btn btn-default"/>  </td>
	
<?php }  ?>
   </tr>
  </table> 
 </div>	




		 <div id="datos_marca">
		 <h3>Editar Categoria</h3>
		 <hr>

		 	<form id="formu_editar">


			 	<div class="form-group" hidden>

							    <label for="Marca">Id</label>
							    <input type="text" class="form-control" id="txt-id_marca" name="id_categoria" >
				</div>

				<div class="form-group">
							    <label for="Nombre">Nombre de Categoria</label>
							    <input type="text" class="form-control" id="txt-nombre" name="nombre_categoria" >
				</div>

				<div class="row">
					<div class="col-xs-4">
							<input type="button" class="btn btn-warning" value="Guardar" id="btn-guardar" /> 
					</div>
				</div>

			</form>
		</div>

 </div>
 
 </body>
 </html>