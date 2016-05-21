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


</head>


<body>

<header class="box">
		<div class="logo"></div>		
</header>

<?php require_once('Menu_Clientes.php'); ?>
<div class="container">
		<p><h2 style="text-align:center;">Productos</h2></p>
			<br/>
			<hr />	
</div>

<div class="container">
			<?php foreach (producto_categoria($Id_categoria) as $datos) {?>
			<!-- modificar para crear cuadros -->	
				<div class="container-fluid col-md-4">
					<a href=<?php echo $datos["url_producto"].$datos["nombre_img"]; ?> >
						<div>
							<div class="thumbnail">
								<img src=<?php echo $datos["url_producto"].$datos["nombre_img"];?> id="imagen-producto"/>
								<div class="caption">
									<h3 style="text-align:center;"><strong><?php echo $datos["nombre_producto"]; ?></strong></h3>
									<p><strong>Marca:</strong> <?php echo $datos["nombre_marca"]; ?> </p>
									<p><strong>Precio:</strong> $<?php echo $datos["precio"]; ?> </p>
									<P class="ocultartxt"><strong>Descripcion:</strong><?php echo $datos["descripcion"]; ?></P>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div> 
		    
 <nav>
	 <ul class="pager pager-lg">
		 <li><a href="#">Atras</a></li>
		 <li><a href="#">Siguiente</a></li>
	  </ul>
</nav>	

	
  
</body>

</html>