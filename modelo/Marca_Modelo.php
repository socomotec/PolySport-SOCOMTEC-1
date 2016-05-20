<?php
require_once('../conector/Conexion.php');
require_once('../controlador/Marca_Controlador.php');



class Marca 

{

	private $db;
	private $Usuario_var;



	public function __construct()

	{
		$this->db=Conections::connect();
		$this->Usuario_var=array();
	}

public function insertar_marca($nombre_marca)

		{

			$consult = $this->db->prepare("INSERT INTO marca (nombre_marca) VALUES(?)");
			$consult->bind_param('s', $nombre_marca);
			$consult->execute();
			    

		}

public function mostrar_todos_marca()

		{

			$consult = $this->db->query("SELECT * FROM marca");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;
			
		}

		public function mostrar_especifico_marca($Id_Marca)
		{
			$consult = $this->db->query("SELECT * FROM marca WHERE id_marca='$Id_Marca'");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;

		}

		public function editar_nombre_marca($Nombre_Marca, $Id_marca){

			$consult = $this->db->prepare("UPDATE marca SET nombre_marca = ? WHERE id_marca = ?");
			$consult->bind_param('si', $Nombre_Marca, $Id_marca);
			$consult->execute();

		}

		public function eliminar_marca($Id_Marca){
			$consult = $this->db->prepare("DELETE FROM marca WHERE id_marca= ?");
			$consult->bind_param('i', $Id_Marca);
			$consult->execute();


		}

		


}

 ?>