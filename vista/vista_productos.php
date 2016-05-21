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
	 <div class="row">
	 	

	 </div> 
         


<?php foreach (producto_categoria($Id_categoria) as $datos) {?>

<!-- modificar para crear cuadros-->	

<div class="row" id="container-producto">
	<div id="container-producto">
		  <div class="col-xs-12 col-sm-offset-2 col-md-offset-2 col-sm-3 col-md-3">
				    <a href=<?php echo $datos["url_producto"].$datos["nombre_img"]; ?> class="thumbnail">
				      <img src=<?php echo $datos["url_producto"].$datos["nombre_img"];?> id="imagen-producto"/>
				    </a>
		  </div>

		  <div class="col-xs-12 col-sm-5 col-md-5" >
		  		<h3 style="text-align:center;"><?php echo $datos["nombre_producto"]; ?></h3>
		  		<P><?php echo $datos["descripcion"]; ?></P>
		  		<p><strong>Marca:</strong> <?php echo $datos["nombre_marca"]; ?> </p>
		  		<p><strong>Precio:</strong> $<?php echo $datos["precio"]; ?> </p>
		  			

		  </div>
	</div>	  
</div>


<hr/>



	<?php } ?>


	 	<nav>
			  <ul class="pager pager-lg">
			    <li><a href="#">Atras</a></li>
			    <li><a href="#">Siguiente</a></li>
			  </ul>
		</nav>



	 	
	 	
  </div>     
  
  


</body>


</html>