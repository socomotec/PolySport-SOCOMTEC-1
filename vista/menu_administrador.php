<?php
if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

  header("location: ../index.php"); //si existe nos enviara al menu_administrador.php

}

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
		<script src="js/jquery-ui.js"></script>
		<script src="js/miEstilo.js"></script>-->
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">Menu Principal</a>
    </div> <!--ICONOS DEL NAV BAR RESPONSIVOS -->

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!--menu de la izquierda por defecto-->
      <ul class="nav navbar-nav">

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Registrar_Usuario.php">Agregar Usuario</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Lista_General_Usuario.php">Lista General Usuario</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Producto<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Registrar_Producto.php">Agregar Producto</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Lista_General_Producto.php">Lista de Productos</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoria<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Registrar_Categoria.php">Agregar Categoria</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Lista_General_Categoria.php">Lista de Categorias</a></li>
          </ul>
        </li>  

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marca<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Registrar_Marca.php">Agregar Marca</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Lista_General_Marca.php">Lista de Marcas</a></li>
          </ul>
        </li>    
      </ul>
      
      <ul class="nav navbar-nav navbar-right"> <!--MENU DE LA DERECHA CON LA CLASE NAV-BAR RIGHT -->
      
        <li class="active"><a href="#"><?php  echo $_SESSION['usuario']; ?><span class="sr-only">(current)</span></a></li>
        <li><a href="Cerrar_Session.php">Cerrar sesion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>