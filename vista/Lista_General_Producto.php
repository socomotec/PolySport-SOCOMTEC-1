<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

  header("location: ../index.php"); //si existe nos enviara al menu_administrador.php

}

require_once('../controlador/Producto_Controlador.php');
require_once('../controlador/Marca_Controlador.php');
require_once('../controlador/Categoria_Controlador.php');

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
		<script type="text/javascript" src="js/Tablejquery-latest.js"></script> 
		<script type="text/javascript" src="js/Table/jquery.tablesorter.min.js"></script> 
		<script src="http://listjs.com/no-cdn/list.js"></script>

		<script>
		$(document).ready(function() {
				var options = {
  				valueNames: [ 'nombre', 'marca', 'categoria', 'precio', 'acciones' ]
						};

				var productosList = new List('productos', options);

			$("#Tabla_Productos").tablesorter();
			$("#Tabla_Productos").tablesorter( {sortList: [[0,0], [1,0]]} );
			$("#Tabla_Productos").tablesorter({ 
        // sort on the first column and third column, order asc 
        sortList: [[0,0],[2,0]] 
    }); 
			
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

				$("#ver-"+arre[i]).click(function(event) {
	

						var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID
         					var formudato = new FormData();
         					formudato.append('producto', tribut);
						//Poner un ajax que vaya a buscar la informacion para mostrarla, en la edición.

       						$.ajax({
        					async: false,
        					type: 'POST',
        					url: 'Capturar_Buscar_Producto.php',
        					data: formudato,
        					contentType:false,
        					processData:false,
        					dataType: 'json',

      
      						}).done(function(datos) { 

      							$("#Mostrar_foto").attr("src", datos[6]+datos[7]);
      							$("#Titulo").text(datos[1]);
      							
          						

    						});
    						$('#imagen').modal('show');
				});

				$("#editar-"+arre[i]).click(function(event) {
					

							var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID
         					var formudato = new FormData();
         					formudato.append('producto', tribut);
						//Poner un ajax que vaya a buscar la informacion para mostrarla, en la edición.

       						$.ajax({
        					async: false,
        					type: 'POST',
        					url: 'Capturar_Buscar_Producto.php',
        					data: formudato,
        					contentType:false,
        					processData:false,
        					dataType: 'json',

      
      						}).done(function(datos) { 

      							$('#Editar_Nombre_Producto').val(datos[1]);
      							$('#slc-marca > option[value=' + datos[5] + ']').attr('selected', 'selected');
      							$('#slc-categoria > option[value=' + datos[2] + ']').attr('selected', 'selected');
      							$('#Editar_Precio_Producto').val(datos[4]);
      							$('#Editar_Descripcion_Producto').val(datos[3]);
      							
          						

    						});

						$('#edicion').modal('show');

				});

				
		

		}
	

				

		});

		</script>


</head>
 <body>
<?php require_once('menu_administrador.php'); ?>

	<div class="container">
		<h1 class="text-center">Lista de Productos</h1>
	<hr />
		 	

		
<div class="row">
	<div id="productos">

			<div class="text-right">
		  		<label for="busquedad">Buscar: </label>
		  		<input class="search" id="txt-busquedad">
		  	
			</div>
			<br/>

		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  	<div class="panel-heading text-center col-xd-10"> <i class="fa fa-list-alt"></i>  <strong> LISTA DE PRODUCTOS</strong> </div>
		  <!-- Table -->
			  	<table cellspacing="1" class="table table-striped table-hover tablesorter text-center" id="Tabla_Productos">
					<thead>
					  	<tr class="success">
					    	<th class="text-center"><a class=""> Nombre </a> </th>

					    	<th class="text-center"><a> Marca</a></th>

					    	<th class="text-center"><a> Categoria </a></th>
					    	
					    	<th class="text-center"><a> Precio </a></th>

					    	<th class="text-center"><a> Acciones</a></th>

					    </tr>
					<thead>

					<tbody class="list">
					<?php foreach (lista_general_producto() as $ListP) { ?>
					<tr>	
						
						<td class="nombre"> <?php echo $ListP['nombre_producto']; ?> </td>

						<td class="marca"> <?php foreach(mostrar_especifico_marca($ListP['id_marca']) as $ListM){

								echo $ListM['nombre_marca'];

						}  ?> </td>

						<td class="categoria"> <?php foreach(lista_categoria_especifica($ListP['id_categoria']) as $ListC){

								echo $ListC['nombre_categoria'];

						}  ?> </td>
						
						<td class="precio"> <?php echo $ListP['precio']; ?> </td>

						<td class="acciones">

						<button class="btn btn-warning" id="<?php echo 'editar-'.$ListP['id_producto'];  ?>" title="Editar"> <i class="glyphicon glyphicon-pencil"> </i></button>
						<button class="btn btn-danger" id="<?php echo 'eliminar-'.$ListP['id_producto'];  ?>" title="Eliminar"> <i class="glyphicon glyphicon-trash"> </i></button>
						<button class="btn btn-primary" id="<?php echo 'ver-'.$ListP['id_producto']; ?>" title="Ver Imagen"> <i class="glyphicon glyphicon-eye-open"> </i></button>

						</td>

						</tr>
						<?php } ?>
					</tbody>

				</table>
			
			</div>
		</div>
	</div>

	</div>

		<div id="edicion" class="modal fade" tabindex="-1" role="dialog">
  			<div class="modal-dialog">
   				<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title text-center">Editar Producto</h4>
      				</div>

      				<div class="modal-body">
							
							<div class="form-group">
    							<label>Nombre del Producto: </label>
    							<input type="text" class="form-control" name="nombre_producto" id="Editar_Nombre_Producto">
  							</div>
							
							<label>Marca:</label> <select class="form-control" name="select_marca" id="slc-marca">
  								   <option value="0">Ingresar Marca</option>
  								   <?php foreach (lista_marca() as $ListM) { ?>		
								    <option value=<?php echo $ListM['id_marca']?> > <?php echo $ListM['nombre_marca']; ?></option>
							        <?php } ?>	

  								  </select>
  							<br />

  							<label>Categoria:</label> 
  							<select class="form-control" name="select_categoria" id="slc-categoria">
  										<option value ="0">Ingrese Categoria</option>
  										<?php foreach (lista_categoria() as $ListC) { ?>
							
										<option value=<?php echo $ListC['id_categoria']; ?> ><?php echo $ListC['nombre_categoria']; ?></option>
										<?php }?>
  							</select>
							<br />
  							<div class="form-group">
    							<label>Precio: </label>
    							<input type="text" class="form-control" name="precio" id="Editar_Precio_Producto">
  							</div>
							
  							<label>Descripcion: </label> <textarea class="form-control" rows="5" id="Editar_Descripcion_Producto" name="descripcion"></textarea>

			 
			 

							

      				</div>

      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        				<button type="button" class="btn btn-primary">Guardar</button>
      				</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div id="imagen" class="modal fade" tabindex="-1" role="dialog">
  			<div class="modal-dialog">
   				<div class="modal-content">
      				<div class="modal-header text-center">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 id="Titulo" class="modal-title"></h4>
      				</div>

      				<div class="modal-body">
							
							<img id="Mostrar_foto" src="" alt="" class="img-rounded" width="100%">
							

      				</div>

      				<div class="modal-footer">
        				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      				</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


</body>
</html>