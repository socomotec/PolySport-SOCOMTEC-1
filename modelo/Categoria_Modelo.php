<?php
require_once('../conector/Conexion.php');
require_once('../controlador/Categoria_Controlador.php');



class Categoria

{

	private $db;
	private $Usuario_var;



	public function __construct()

	{
		$this->db=Conections::connect();
		$this->Usuario_var=array();
	}

public function insertar_categoria($nombre_categoria)

		{

			$consult = $this->db->prepare("INSERT INTO categoria (nombre_categoria) VALUES(?)");
			$consult->bind_param('s', $nombre_categoria);
			$consult->execute();
			    

		}

public function mostrar_todos_categoria()

		{

			$consult = $this->db->query("SELECT * FROM categoria");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;
			
		}

		public function mostrar_especifica_categoria($Id_Categoria)
		{

			$consult = $this->db->query("SELECT * FROM categoria WHERE id_categoria ='$Id_Categoria'");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;

		}

		public function editar_categoria($Nombre_Categoria, $Id_Categoria)
		{
			$consult = $this->db->prepare("UPDATE categoria SET nombre_categoria = ? WHERE id_categoria = ?");
			$consult->bind_param('si',$Nombre_Categoria, $Id_Categoria);
			$consult->execute();

		}


		public function eliminar_categoria($Id_Categoria)
		{
			$consult = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = ?");
			$consult->bind_param('i', $Id_Categoria);
			$consult->execute();


		}
}

 ?>