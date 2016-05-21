<?php

class Conections
{

	public static function connect()
	{
		$mySql = new mysqli('localhost', 'root', '', 'poly_sport') or die("No conecto la base de dato");
 
		$mySql->query("SET NAMES 'utf8'");

		return $mySql;


	}

 }  

 ?>