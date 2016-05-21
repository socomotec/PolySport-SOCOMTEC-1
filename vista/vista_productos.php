<?php 
require_once('../controlador/Producto_Controlador.php');

$Id_categoria = $_REQUEST['id_categoria'];

?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Productos</title>
	<link rel="shortcut icon" href="img/favicon.ico" />


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
			
			var nombre, marca, precio, descripcion, img;
			
			function mostrar(){
				
				limpiar();
				
				nombre = $("#nombre").text();
				marca = $("#marca").text();
				precio = $("#precio").text();
				descripcion =$("#descripcion").text();
				img = $("#imagen-producto").attr("src");
				
				$("#Mmarca").html( marca);
				$("#Mprecio").html(precio);
				$("#Mdescripcion").html(descripcion);
				$("#Mproducto").html(nombre);
				$("#MimgNormal").attr("src",img);
				$("#MimgNormal").addClass("imagen-producto");
				$('#mostrar').modal('show');
			}
			
			function limpiar(){
				nombre = "";
				marca = "";
				precio = "";
				descripcion = "";
				img = "";
				
				$("#Mmarca").html("");
				$("#Mprecio").html("");
				$("#Mdescripcion").html("");
				$("#Mproducto").html("");
				$("#MimgNormal").attr("src", null);
			}    		
			/*$("#ver-"+arre[i]).click(function(event) {
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
    			$('#mostrar').modal('show');
			});*/
		</script>
</head>


<body>

<header class="box">
		<div class="logo"></div>		
</header>

<?php require_once('Menu_Clientes.php'); ?>
<div class="container">
		<p><h1 style="text-align:center;"><strong> Productos </strong></h1></p>
			<br/>
			<hr />	
</div>

	<div class="container">
			<?php foreach (producto_categoria($Id_categoria) as $datos) {?>
			<!-- modificar para crear cuadros -->	
				<div  class="container-fluid col-xs-12 col-sm-6 col-md-4" onclick="mostrar()">
					<div class="zoom">
						<div class="thumbnail">
							<img  id="imagen-producto" src=<?php echo $datos["url_producto"].$datos["nombre_img"];?> class="img-responsive" alt="Responsive image"/>
							<h2  id="nombre" class="corre" style="text-align:center;"><strong><?php echo $datos["nombre_producto"]; ?></strong></h2>
							<p  id="marca" class="corre"><strong>Marca:</strong> <?php echo $datos["nombre_marca"]; ?> </p>
							<p  id="precio"class="corre"><strong>Precio:</strong> $<?php echo $datos["precio"]; ?> </p>
							<P  id="descripcion"class="ocultartxt corre"><strong>Descripcion: </strong><?php echo $datos["descripcion"]; ?></P>					
						</div>
					</div>
				</div>
			<?php } ?>
		</div> 
		    
 <nav>
	 <ul class="pager pager-lg">
		 <li><a href="#">Atras</a></li>
		 <li><a href="#">Siguiente</a></li>
	  </ul>
</nav>	
<!-- 
	producto
	imagen
	nombre 
	precio
	la descripcion
	--->
<div id="mostrar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 id="Mproducto" class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<div class="row col-sm-8">
					<img id="MimgNormal"/>
				</div>
				<div class="row col-sm-4">
					<p id="Mmarca"></p>
					<p id="Mprecio"></p>
					<P id="Mdescripcion"></P>	
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
  
</body>

</html>