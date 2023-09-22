<?php
include_once "Model/Cliente.php";
/*require "Sesion.php";*/

/*$start_sesion = new SesionControl;*/
class control{

	public $Usuario;

    public function __construct(){
		$this->Usuario = new cliente();
	}

    public function registrame(){
		include_once "View/Registro.php";
	}

}

?>