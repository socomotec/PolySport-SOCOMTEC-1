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
		<script src="js/list.min.js"></script>
		<script src="js/list.pagination.min.js"></script>
		
		<script>

		var nombre, marca, precio, descripcion, img;
			
			function limpiar(){
				nombre = "";
				marca = "";
				precio = "";
				descripcion = "";
				img = "";
				
				$("#Mmarca").text(null);
				$("#Mprecio").text(null);
				$("#Mdescripcion").text(null);
				$("#Mproducto").text(null);
				$("#MimgNormal").attr("src", null);
			};	

			function mostrar(id){
				limpiar();

					nombre = $("#nombre-" + id).text();
					img = $("#imagen-" + id).text();
					precio = $("#precio-" + id).text();
					marca = $("#marca-" + id).text();
					descripcion = $("#descripcion-" + id).text();

					//alert(img);

					$("#Mmarca").text(marca);
					$("#Mprecio").text(precio);
					$("#Mdescripcion").text(descripcion);
					$("#Mproducto").text(nombre);
					$("#Mimagen").attr("src", img);

					$("#mostrar").modal();
				};

			$(document).ready(function() {

				
		//Buscar y Paginar

	        	//var monkeyList = new List('productos', {
  				//valueNames: ['nombre', 'marca', 'precio'],
  				//page: 10,
  				//plugins: [ ListPagination({}) ] 
				//});	
			
			});
		</script>
</head>


<body>

<header class="box">
		<div class="logo"></div>		
</header>

<?php require_once('Menu_Clientes.php'); ?>
<div class="container">
		<p><h1 style="text-align:center;"><strong> Productos </strong></h1></p>
			
</div>
	
	<div class="container">
			<div id="productos">
			
			<div class="text-right ">
		  		<label for="busquedad">Buscar: </label>
		  		<input class="search" id="txt-busquedad">
			</div>
			<hr />	
			<div class="list">
			<?php 
			foreach (producto_categoria($Id_categoria) as $datos) {?>
			<!-- modificar para crear cuadros -->	
				<div  class="container-fluid col-xs-12 col-sm-6 col-md-4"  onClick="mostrar(this.id)"  id="<?php echo $datos["id_producto"]; ?>" >
					<div class="zoom">
						<div class="thumbnail">
							<img src=<?php echo $datos["url_producto"].$datos["nombre_img"];?> class="img-responsive" alt="Responsive image" style="height:300px; "/>
							<p class="hide" id=<?php echo 'imagen-'.$datos['id_producto']; ?> > <?php echo $datos["url_producto"].$datos["nombre_img"];?> </p>	
							<h2  id="<?php echo 'nombre-'.$datos['id_producto']; ?>" class="corre" style="text-align:center;"><strong><?php echo $datos["nombre_producto"]; ?></strong></h2>
							<p  id="<?php echo 'marca-'.$datos['id_producto']; ?>" class="corre"><strong>Marca:</strong> <?php echo $datos["nombre_marca"]; ?> </p>
							<p  id="<?php echo 'precio-'.$datos['id_producto']; ?>" class="corre"><strong>Precio:</strong> $<?php echo $datos["precio"]; ?> </p>
							<P  id="<?php echo 'descripcion-'.$datos['id_producto']; ?>" class="ocultartxt corre" ><strong>Descripcion: </strong><?php echo $datos["descripcion"]; ?></P>					
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<!--
	<div class="text-center">
  		<ul class="pagination">
  		</ul>
	</div>
-->
  <div id="mostrar" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 id="Mproducto" class="modal-title text-center"> Modal title</h2>
        </div>
        <div class="modal-body">
			<div class="container-fluid">
				<div class="row col-xs-12 col-sm-12 col-md-8" >
					<img id="Mimagen" class="thumbnail img-responsive maxwit" alt="Responsive image" style=" max-width:500px;" />
				</div>
				<div class="row col-xs-12 col-sm-12 col-md-4" >
					<p id="Mmarca">marca</p>
					<p id="Mprecio" >precio</p>
					<P id="Mdescripcion">descripcion</P>
				</div>
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