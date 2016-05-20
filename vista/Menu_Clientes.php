<?php
require_once('../controlador/Categoria_Controlador.php');

 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Productos</title>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="css/miEstilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	    <link rel="stylesheet" tyspe="text/css" href="css/animate.css" />
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />


		<!--<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootbox.min.js"></script>
		<script src="js/jquery-ui.js"></script>-->
		<script src="js/miEstilo.js"></script>
		<script>


		$(document).ready(function() {
		 
			var incrementador = -1; //INCREMENTADOR PARA EL ARREGLO
			arre = []; //DEFINIMOS EL ARREGLO
		 
		  
		
 		  <?php foreach (lista_categoria() as $ListC) { ?> //PASAMOS METODO LISTA DE CATEGORIA
 		  	incrementador += 1;
 		  	var Prueba_php = [ <?php echo $ListC['id_categoria']; ?> ]; //VALORES QUE LE VAMOS A PASAR AL ARREGLO

 		  	
 		  	arre[incrementador] = Prueba_php; //GUARDAMOS LOS VALORES DENTRO DEL ARREGLO QUE SE RECORRE SOLO

 		  	


 		  	
		  <?php } ?>

		  
		for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
		{


			$("#"+arre[i]).click(function() { //CREAMOS UNA FUNCION DE UN CLICK DENTRO DEL FOR PARA CAPTURAR LA LISTA
         	  

         		var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID

         		 
         		 //console.log( $("#"+tribut).text() ); //SELECCIONAMOS LO QUE ESTA EN EL ID 


         		 var datos = new FormData();
         		 datos.append('id_categoria', tribut);

         		 $.ajax({
					async: false,
					type: 'POST',
					url: 'vista_productos.php',
					data: datos, 
					contentType:false,
					processData:false,
					
					
				  })
				  .done(function() {

				  	document.location.href = "vista_productos.php?id_categoria=" + tribut;
				  
					 
				 });
         	
         });



		}	  


         	


		});


		</script>
</head>
<body>

<nav class="navbar navbar-default" id="menu_clientes">

  <div class="container-fluid" id="menu_clientes_abajo">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id="menu_clientes_abajo">
      <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">Pagina pricipal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="Menu_Vista_Producto.php">Informacion</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php foreach (lista_categoria() as $ListC) { ?>
            <li id=<?php echo $ListC['id_categoria']; ?>><a href="#"><?php echo $ListC['nombre_categoria']; ?></a></li>
              
            

            <?php } ?>
          </ul>
        </li>
        
        <li><a href="../index.php#footer-row2">Contacto</a></li>
        
        
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>