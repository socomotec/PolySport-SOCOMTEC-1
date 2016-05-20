<?php
require_once('../controlador/Producto_Controlador.php');

$validador_img = explode('.', $_FILES['imagen_producto']['name']); //separamos por cadena
$error;

if($_FILES['imagen_producto']['error'] > 0)  //VERIFICAMOS QUE NO HAY UN ERROR
{

	$error = "No se pudo subir el archivo";
	

}else { 


$Capturamos_Date = getdate();


$validador_img[1] = strtolower($validador_img[1]); //PASAMOS LA VARIABLE VALIDAR_IMG EN LA POSICION 1 A MAYUSCULA
$validador_img[0] = $validador_img[0]."".rand(0, 1999999)."".$Capturamos_Date['year']."".$Capturamos_Date['mon']."".$Capturamos_Date['mday']."".rand(0, 77777);
$validador_img[0] = str_replace(" ", "_", $validador_img[0]);

$Direccion_Producto = "img_producto/"; //Url donde subimos el Producto
$Nombre_Imagen = $validador_img[0].".".$validador_img[1];
$Nombre_Producto = $_POST['nombre_producto'];
$Id_Categoria = $_POST['select_categoria'];
$Descripcion = $_POST['descripcion'];
$Precio = $_POST['precio']; 
$Fecha_Subida = $Capturamos_Date['year']."-".$Capturamos_Date['mon']."-".$Capturamos_Date['mday'];
$Id_Marca = $_POST['select_marca'];



 if($validador_img[1] == 'jpg' || $validador_img[1] == 'jpeg') {



move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $Direccion_Producto.$Nombre_Imagen); //MOVEMOS LA CARPETA
chmod($Direccion_Producto.$Nombre_Imagen,0777);     //DAMOS PERMISOS 777 PARA TODOS LOS USUARIO LECTURAS Y ESCRITURAS

agregar_producto($Direccion_Producto, $Nombre_Producto, $Nombre_Imagen, $Id_Categoria, $Descripcion, $Precio, $Fecha_Subida, $Id_Marca);
$error = 'Archivo subido con Exito';

		}else{

			$error = 'No se pudo Guardar el archivo, porque no es una imagen';
	
				}



}

echo $error;
json_encode($error);

 ?>