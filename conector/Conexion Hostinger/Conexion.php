<?php

class Conections
{

	public static function connect()
	{
		$mySql = new mysqli('mysql.hostinger.es', 'u145482429_root', '123456', 'u145482429_base2') or die("No conecto la base de dato");
 
		$mySql->query("SET NAMES 'utf8'");

		return $mySql;


	}

 }  


 /* echo "<h1> hola </h1>"; */

 ?>