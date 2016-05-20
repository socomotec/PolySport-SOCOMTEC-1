<?php 
require_once('../controlador/Producto_Controlador.php');



?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Informacion</title>
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

			$(document).ready(function() {
				$('.progress').css('display', 'none');
			
			

			function Cargar_Imagen(){

				$('.progress').css('display', 'block');

				


				
			}

			$('#btn-enviar').click(function(event) {
				
				var valor = window.onload=Cargar_Imagen();
				console.log(valor);

			});



			});

		</script>
</head>


<body>

<header class="box">
		<div class="logo"></div>		
</header>

<?php require_once('Menu_Clientes.php'); ?>


<div class="container">
   
       <h1> Bienvenido</h1>
       <hr>
        
 <div class="row">
   <div class="col-xs-12 col-sm-12">
			<!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
					  </ol>

			  
				  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="img/fondoPolysport.jpg" alt="...">
						      <div class="carousel-caption">
						        <h2>Bienvenido a PolySport</h2>
						        <p>Revisa nuestros productos</p>
						      </div>
						    </div>
						    <?php foreach (mostrar_por_fechas() as $ListF) { ?>
							    <div class="item">
							      <img src=<?php echo $ListF["url_producto"].$ListF["nombre_img"]; ?> alt="...">
							      <div class="carousel-caption">
							        <h2> <?php echo $ListF['nombre_producto']; ?> </h2>
							        <p> <h4>Marca: <?php echo $ListF['nombre_marca']; ?></h4>  <h4>Precio: <?php echo $ListF['precio']; ?></h4> </p>
							      </div>
							    </div>
					
							<?php }   ?>

				    
				  </div>

			  			
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
		 </div>
	</div>
</div>-->

<br />



        <div class="jumbotron" id="jumbo-informacion">
       		<h1>Siguenos en Facebook</h1>
       		<p>click en <strong>like</strong> para seguirnos en Facebook <a href="https://www.facebook.com/"><i class="fa fa-thumbs-o-up fa-2x"></i></a></p>
       </div>  

       



 	

<br />


 	<div class="col-xs-12 col-sm-6">
			<h1>Misión</h1>
		
			Satisfacer las necesidades deportivas de nuestros consumidores,
			ofreciendo productos para el deporte con los más altos estándares de 
			calidad a precios accesibles para todo tipo de público y mercado  

		</div>


	<div class="col-xs-12 col-sm-6">
				<h1>Visión</h1>
		 
		 		Lograr posicionar nuestra institución en el mercado siendo 
		 		una de las empresas más completas a nivel de productos deportivos,
		 		ofreciendo siempre calidad, precio y garantía de todos los implementos 
		 		que ofrecemos a nuestros consumidores. 

		 </div>

 
       



	


<div style="height: 200px"></div>
</body>


</html>