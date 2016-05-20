<?php

require_once('../conector/Conexion.php');
require_once('../controlador/Usuario_Controlador.php');


class Usuario {

	private $db;
	private $Usuario_var;



	public function __construct()

	{
		$this->db=Conections::connect();
		$this->Usuario_var=array();
	}

	public function insertar($rut, $nombre, $apellido, $email, $contraseña)

		{

			$consult = $this->db->prepare("INSERT INTO usuario (rut, nombre, apellido, email, contraseña) VALUES(?, ?, ?, ?, ?)");
			$consult->bind_param('sssss', $rut, $nombre, $apellido, $email, $contraseña);
			$consult->execute();
			    

		}


	public function mostrar_todos_usuarios()

	{

		$consult = $this->db->query("SELECT * FROM usuario");

		while($var_selec = $consult->fetch_assoc()){

			$this->Usuario_var[] = $var_selec;

		}

		return $this->Usuario_var;
		
	}


	public function buscar_especifico($Rut)
	{
			
			$consult=$this->db->query("SELECT * FROM usuario WHERE rut='$Rut'");
			
			while($var_selec= $consult->fetch_assoc() ){
				
				$this->Usuario_var[]=$var_selec;
				
				}
				return $this->Usuario_var;
			}

	 public function eliminar_usuario($Rut)

	 {
	 	$consult = $this->db->prepare("DELETE FROM usuario WHERE rut = ? ");
		$consult->bind_param('s', $Rut);
	    $consult->execute();

	 }


	 public function editar_usuario($rut, $nombre, $apellido, $email)
	{
		$consult = $this->db->prepare("UPDATE usuario SET nombre = ?, apellido = ?, email = ? WHERE rut = ?");
		$consult->bind_param('ssss', $nombre, $apellido, $email, $rut);
		$consult->execute();

	}


	public function iniciar_sesion($email, $contraseña)
	{
		$consult=$this->db->query("SELECT * FROM usuario WHERE email='$email' and contraseña='$contraseña'");
			
			while($var_selec= $consult->fetch_assoc() ){
				
				$this->Usuario_var[]=$var_selec;
				
				}
				return $this->Usuario_var;

	}

}




 ?>