<?php
session_start();

if(!isset($_SESSION['usuario'])){ //evaluamos si existe el inicio de session 

  header("location: intro_usuario.php"); //si existe nos enviara al menu_administrador.php

}


require_once('../controlador/Usuario_Controlador.php');

 ?>

<!DOCTYPE html>
<html>
<head lang="es">
	<title>Lista General Ususario</title>


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
      $('#div_usuario').css('display','none');  
      var incrementador = -1; //INCREMENTADOR PARA EL ARREGLO
      arre = []; //DEFINIMOS EL ARREGLO
      
    
      <?php foreach (lista_general_usuario() as $ListC) { ?> //PASAMOS METODO LISTA DE CATEGORIA
        incrementador += 1;
        var Prueba_php = "<?php echo $ListC['rut']; ?> "; //VALORES QUE LE VAMOS A PASAR AL ARREGLO

        
        arre[incrementador] = Prueba_php; //GUARDAMOS LOS VALORES DENTRO DEL ARREGLO QUE SE RECORRE SOLO

        


        
      <?php } ?>

      
    for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
    {


      $("#eliminar_"+arre[i]).click(function() { //CREAMOS UNA FUNCION DE UN CLICK DENTRO DEL FOR PARA CAPTURAR LA LISTA
            
            var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID

            var listUser = new FormData();
            listUser.append('rut', tribut);
            


                bootbox.dialog({
            message: " Este usuario se eliminara permanentemente ¿Desea Eliminar al Usuario</strong> ?",
            title: "<strong>Eliminar</strong>",
            buttons: {
              success: {
                label: "Si",
                className: "btn-primary",
                callback: function() {
                    $.ajax({
                      url: 'Recibe_Eliminar_Usuario.php',
                      type: 'POST',
                      dataType: 'json',
                      data: listUser,
                      async: false,
                      contentType:false,
                      processData:false,
                    }).done(function() {

                  console.log("listo");
                                  

                  }) .fail(function() {

                      bootbox.alert("<h3>Se a Eliminado satisfactoriamente</h3>");   //alerta de eliminacion correcta
                      

                    });
                    

                }
              },
              danger: {     //nombramos el boton dento del dialog para el que veremos con sus funciones
                label: "Cancelar",  //titulo del boton
                className: "btn-danger", //clase de bootbox
                callback: function() {
                  //lo que realizaremos dentro del boton alert
                }
              }
             }
            });   //SE CIERRA EL BOTON DE DIALOGO
        
            
                   
            
                              
             

            
          
         });



    }

      



    for( var i = 0; i<arre.length; i++) //DEFINIMOS LOS PARAMETROS PARA RECORRER EL ARREGLO
    {


      $("#editar_"+arre[i]).click(function() { //CREAMOS UNA FUNCION DE UN CLICK DENTRO DEL FOR PARA CAPTURAR LA LISTA
            
            var tribut = $(this).attr("id"); //EXTREMOS EL NUMERO DE LA ID

            var listUser = new FormData();
            listUser.append('rut', tribut);

            $.ajax({

            url: 'Recibe_Buscar_Usuario.php', //PASAMOS LOS DATOS A RECIBE_USUARIO.....ETC
            type: 'POST',   //TIPO DE DATO QUE VAMOS ENVIAR ENCRIPTADO
            dataType: 'json',
            data: listUser, //ESPECIFICAMOS LOS DATOS QUE VAMOS A MANDAR
            async: false,
            contentType:false,
            processData:false,
          })
          .done(function(data) { //RECIBIMOS LOS DATOS DEL RECIBE BUSCAR USUARIO MEDIANTE JSON_ENCODE DENTRO DE FUNCTION((DATA)

            console.log("done");

            $('#div_usuario').css('display', 'block'); //ENVIAMOS QUE EL DIV SEA VISIBLE
            $('#txt-rut').val(data[0]); //LE PASAMOS LOS VALORES DEL ARREGLO
            $('#txt-nombre').val(data[1]);
            $('#txt-apellido').val(data[2]);
            $('#txt-email').val(data[3]);


          })
          .fail(function() { //EN EL CASO DE QUE FALLE MANDAMOS UNA ALERTA DICIENDO QUE NO ESTAN LOS REGISTROS
            bootbox.alert("EL usuario no se encuentra en el registro");
            $('#div_usuario').css('display', 'none'); //PONEMOS EL DIV COMO NO VISIBLE
            $('#buscador_rut').val(""); //INPUT BUSCADOR_RUT LO DEJAMOS EN BLANCO
          })
          .always(function() {
            console.log("complete");
             //UNA VEZ BUSCAMOS DEJAMOS LOS ATRIBUTOS SOLO LECTURA PARA QUE NO PUEDAN CLICKEAR LOS INPUT
            
          });




                  });  //TERMINA EL BUTTON
              }


              $('#btn-guardar').click(function() { //FUNCION PARA EL BOTON GUARDAR DEL EDITAR

          if( $('#txt-nombre').val().length < 1 ) //COMPARAMOS SI EL CAMPO NOMBRE ESTA VACIO
          {

            bootbox.alert("Necesita Ingresar un Nombre");

          }else{ //1 (HAY QUE CERRAR UN ELSE)

            if( $('#txt-apellido').val().length < 1 ) //EVALUAMOS SI EL APELLIDO VIENE VACIO
            {

              bootbox.alert("No ha ingresesado el Apellido"); 

            }else { // 2 (HAY QUE CERRAR EL SEGUNDO ELSE)

               if( $("#txt-email").val().length < 1 ) //VALIDAMOS QUE EL EMAIL NO VENGA CON DATOS VACIOS
               {

                bootbox.alert("El email no puede quedar vacio, ingrese email a editar");

               }else{ //3

          var var_editar = $('#formulario_mostrar').serialize(); //CAPTURAMOS EL FORMULARIO CON SERIALIZE

          $.ajax({
            url: 'Recibe_Editar_Usuario.php', //AGREGAMOS LA URL DONDE SE DIRIGE EL DATO VAR_EDITAR
            type: 'POST', //MANERA DEL CUAL SE ENVIARA EL DATO
            dataType: 'json', //TIPO DE DATO JSON
            data: var_editar, //ESPECIFICAMOS EL DATO QUE ENVIAREMOS
          }).done(function() {

            console.log("listo");
            bootbox.alert("deberia decir bien"); //mandamos alerta para que confirme que el usuario se edito
            

          })
          .fail(function() {
            console.log("fail");
            bootbox.alert("Se Edito el Usuario el Usuario Correctamente"); //mandamos alerta para que confirme que el usuario se edito
            

          })
          .always(function() {
            $('#div_usuario').css('display', 'none'); //Que siempre se pase el div a invisible
          });
          
                } 
           }
        }

        
        });  //cierra el boton click 
        
              

      });

    </script>

</head>
 <body>

<?php require_once('menu_administrador.php'); ?>

<div class="container">

  <h1>Lista General de Usuarios</h1>
  <hr>

  <div class="col-xs-12">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        	<div class="panel-heading"> <i class="fa fa-list-alt"></i>  <strong> LISTA DE USUARIOS</strong> </div>
        	

        <!-- Table -->
        	<table class="table table-condensed table-hover">
          <tr>
          	<td><strong> Nombres </strong> </td>
          	<td><strong> Apellidos </strong></td>
          	<td><strong> Email </strong></td>
            <td><strong> Modificar</strong></td>


          </tr>



      <?php foreach (lista_general_usuario() as $datos) {  //AGREGAR UN AUTOCOMPLETE?>
          <tr>
          	<td><?php echo $datos["nombre"]; ?></td>
          	<td> <?php echo $datos["apellido"]; ?></td>
          	<td><?php echo $datos["email"]; ?></td>
            <td><input type="button" value="Editar" id="<?php echo 'editar_'.$datos['rut']; ?>" class="btn btn-default" /> <input type="button" value="Eliminar" id="<?php echo 'eliminar_'.$datos['rut']; ?>" class="btn btn-danger" /></td>

          </tr>
      			<?php } ?>
        	</table>
    </div>

  </div>

        <div id="div_usuario" class="col-xs-12">

          <hr>
            <form id="formulario_mostrar">
                      <div class="form-group">
                        <label for="Rut">Run:</label>
                        <input type="text" class="form-control" id="txt-rut" name="rut">
                      </div>

                      <div class="form-group">
                        <label for="Rut">Nombre:</label>
                        <input type="text" class="form-control" id="txt-nombre" name="nombre">
                      </div>

                      <div class="form-group">
                        <label for="Rut">Apellido:</label>
                        <input type="text" class="form-control" id="txt-apellido" name="apellido">
                      </div>

                      <div class="form-group">
                        <label for="Rut">Email:</label>
                        <input type="text" class="form-control" id="txt-email" name="email">
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