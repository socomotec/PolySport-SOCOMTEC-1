<?php


require_once('../controlador/Usuario_Controlador.php');

$Usuario = $_POST['txt-email']; //CAPTURAMOS USUARIO
$Contraseña = $_POST['txt-contraseña']; //CAPTURAMOS CONTRASEÑA
$Aprobador = iniciar_usuario($Usuario, $Contraseña);//VALIDAMOS SI LA CONTRASEÑA ES CORRECTA
$Bandera = "";

//echo $Usuario_Arreglo[0]." ".$Usuario_Arreglo[1]." ".$Usuario_Arreglo[2]." ";


if( !empty($Aprobador) ) //VERIFICAMOS SI EL USUARIO COINCIDE CON LA CONTRASEÑA
{
	session_start(); //SI COINCIDE DECIMOS QUE INICIE SESSION
	 
	$Usuario_Arreglo = array(); //CREAMOS UN ARREGLO DE USUARIO 
	$Usuario_Arreglo[0] = iniciar_usuario($Usuario, $Contraseña)[0]['nombre'];//AL ARREGLO LE PASAMOS NOMBRE DEL USUARIO DE LA BASE DE DATOS
	$Usuario_Arreglo[1] = iniciar_usuario($Usuario, $Contraseña)[0]['apellido'];//LE PASAMOS APELLIDO
	$Usuario_Arreglo[2] = iniciar_usuario($Usuario, $Contraseña)[0]['email'];//LE PASAMOS EMAIL

	$Bandera = "verdadero"; //IDENTIFICADOR PARA VALIDAR EL INICIO DE SESSION
	


	$_SESSION['usuario'] = iniciar_usuario($Usuario, $Contraseña)[0]['nombre'];
	

}else
{
	
	
	$Bandera = "falso";//SI NO COINCIDE DEVOLVEMOS FALSO
	
	
}


echo json_encode($Bandera);



 ?>