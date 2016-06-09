<?php
require_once('../conector/Conexion.php');
require_once('../controlador/Producto_Controlador.php');

class Producto {

	private $db;
	private $t_var;

	public function __construct()

	{
		$this->db=Conections::connect();
		$this->t_var=array();
	}

	public function insertar_producto($url_producto, $nombre_producto, $nombre_imagen, $id_categoria, $descripcion, $precio, $fecha_subida, $id_marca)

		{

			$consult = $this->db->prepare("INSERT INTO producto (url_producto, nombre_producto, nombre_img, id_categoria, descripcion, precio, fecha_subida, id_marca) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
			$consult->bind_param('sssisisi', $url_producto, $nombre_producto, $nombre_imagen, $id_categoria, $descripcion, $precio, $fecha_subida, $id_marca);
			$consult->execute();
			    
		}

	public function editar_producto($id_producto, $nombre_producto, $marca_producto, $categoria_producto, $precio_producto, $descripcion_producto){

			$consult = $this->db->prepare("UPDATE producto SET nombre_producto = ?,  id_categoria = ?, descripcion = ?, precio = ?, id_marca = ? WHERE id_producto = ?");
			$consult->bind_param('sisiii', $nombre_producto, $categoria_producto, $descripcion_producto, $precio_producto, $marca_producto, $id_producto);
			$consult->execute();

	}

		public function mostrar_todos_productos()

		{

			$consult = $this->db->query("SELECT * FROM producto");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;
			
		}

		public function mostrar_productos_categoria($Id_categoria)

		{

			$consult = $this->db->query("SELECT * FROM producto WHERE id_categoria = '$Id_categoria'");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;

		}

			public function buscar_especifico_producto($Id_Producto)

				{

					$consult = $this->db->query("SELECT * FROM producto WHERE id_producto ='$Id_Producto'");

					while($var_selec = $consult->fetch_assoc()){

						$this->t_var[] = $var_selec;

					}

					return $this->t_var;
			
				}

		public function mostrar_productos_categoria2($Id_categoria)

		{

			$consult = $this->db->query("SELECT id_producto, url_producto, nombre_producto, nombre_img, id_categoria, descripcion, precio, fecha_subida, nombre_marca FROM producto INNER JOIN marca ON(producto.id_marca = marca.id_marca) WHERE id_categoria = '$Id_categoria' ORDER BY precio");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;
			
		}

		public function eliminar_producto($Id_Producto)
		{
			$consult = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
			$consult->bind_param('i', $Id_Producto);
			$consult->execute();

		}
		
		public function mostrar_productos_fechas()

		{

			$consult = $this->db->query("SELECT url_producto, nombre_producto, nombre_img, id_categoria, descripcion, precio, fecha_subida, nombre_marca FROM producto INNER JOIN marca ON(producto.id_marca = marca.id_marca) ORDER BY precio LIMIT 4");

			while($var_selec = $consult->fetch_assoc()){

				$this->t_var[] = $var_selec;

			}

			return $this->t_var;
			
		}

}

?>