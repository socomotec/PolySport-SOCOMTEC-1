<?php

session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

	header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

} 
require_once('../controlador/Marca_Controlador.php');
require_once('../controlador/Categoria_Controlador.php');


?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Registrar el Producto</title>


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

		<script >
		$(document).ready(function() {

		 
		 
			$('#subir_img').click(function(event) {



				if( $('#slc-marca').val()==0 ){
					alert('Seleccione la marca');

				}else{

					if( $('#slc-categoria').val() == 0 ){

						alert('Seleccione una Categoria');
					}else{
				


			var datos = new FormData();
		
			 datos.append('imagen_producto', $("#txt-producto")[0].files[0]); 
			 datos.append('nombre_producto', $("#txt-nombre_producto").val()); //el primero valor es el nombre como lo enviamos
			 datos.append('select_categoria', $("#slc-categoria").val());		//y el segundo son los valores que obtenemos
			 datos.append('descripcion', $("#txa-descripcion").val());
			 datos.append('precio', $("#txt-precio").val());
			 datos.append('select_marca', $("#slc-marca").val());
			 
			 				
					$.ajax({
					async: false,
					type: 'POST',
					url: 'Capturar_Producto.php',
					data: datos, 
					contentType:false,
					processData:false,
					
					
				  })
				  .done(function(datos) {  
					 alert(""+ datos);
					  
					  $("#txt-producto").val("");
					  $("#txt-nombre_producto").val(" ");
					  $("#slc-categoria").val("0");
					  $("#txa-descripcion").val(" ");
					  $("#txt-precio").val(" ");
					  $("#slc-marca").val("0");

				 });
				}
			}

			}); //Button
		 				
		}); //cerrar document ready



		</script>
</head>
<body>
<?php require_once('menu_administrador.php'); ?>
	<div class="container">
	<h1>Agregar Producto</h1>
	<hr>
 	<div id="Prueba">
			<div class="form-group">
			    <label for="exampleInputFile">Archivo a Subir</label>
			    <input type="file" name="imagen_producto" id="txt-producto">
			    <p class="help-block">Seleccione la imagen</p>
		    </div>

		<form id="form_completo">
			<div class="form-group">
    			<label for="exampleInputEmail1">Nombre del Producto: </label>
    			<input type="text" class="form-control" name="nombre_producto" id="txt-nombre_producto">
  			</div>

  			<label>Categoria:</label> <select class="form-control" name="select_categoria" id="slc-categoria">
  										<option value ="0">Ingrese Categoria</option>
  										<?php foreach (lista_categoria() as $ListC) { ?>
							
										<option value=<?php echo $ListC['id_categoria']; ?> ><?php echo $ListC['nombre_categoria']; ?></option>
										<?php }?>

  			</select>
  			<br />

			 <label>Descripcion: </label> <textarea class="form-control" rows="3" id="txa-descripcion" name="descripcion"></textarea>

			 <br />
			 <div class="form-group">
    			<label for="exampleInputEmail1">Precio: </label>
    			<input type="text" class="form-control" name="precio" id="txt-precio">
  			</div>



  			<label>Marca:</label> <select class="form-control" name="select_marca" id="slc-marca">
  								   <option value="0">Ingresar Marca</option>
  								   <?php foreach (lista_marca() as $ListM) { ?>		
								    <option value=<?php echo $ListM['id_marca']?> > <?php echo $ListM['nombre_marca']; ?></option>
							        <?php } ?>	

  								  </select>

  								  <hr />

  								  <input type="button" value="Enviar" id="subir_img" class="btn btn-primary"/>

		</form>


	</div>
</div>
		







<!--<div class="container">
	<div id="Prueba">
		<p>Seleccionar Archivo: <input type="file"	name="imagen_producto" id="txt-producto" /> </p>

	<form id="form_completo">

		<p>Nombre del Archivo <input type="text" name="nombre_producto" id="txt-nombre_producto" /> </p>
			<p> Categoria: <select name="select_categoria" id="slc-categoria">
									<option value ="0">Ingrese Categoria</option>
								<?php foreach (lista_categoria() as $ListC) { ?>
							
									<option value=<?php echo $ListC['id_categoria']; ?> ><?php echo $ListC['nombre_categoria']; ?></option>
								<?php }?>
					
					   </select> </p>

		<p> Descripcion: <textarea id="txa-descripcion" name="descripcion"></textarea></p>
		<p> Precio: <input type="text" name="precio" id="txt-precio"> </p>

			  <p> Marca: <select name="select_marca" id="slc-marca">
			  					<option value="0">Ingresar Marca</option>
					  		<?php foreach (lista_marca() as $ListM) { ?>		
								<option value=<?php echo $ListM['id_marca']?> > <?php echo $ListM['nombre_marca']; ?></option>
							<?php } ?>				 
						</select> </p>

				<input type="button" value="Enviar" id="subir_img"	/>
				   		   
	</form>



	</div>

</div>-->









</body>
</html>