<?php 

class conexion{

	public static function conectar(){
		$a = new PDO("mysql: host=localhost; dbname=gameworld; charset=utf8", "root",""); //Nombre de la base de datos de prueba, no se puede dejar espacios en blanco entre el  =
		$a->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $a;
	}
}
?>