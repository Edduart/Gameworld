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

	public function registrarse(){
		$alm = new cliente();
		$alm->Id = $_POST['txtId'];
		$alm->Nombre = $_POST['nombretxt'];
		$alm->Usuario = $_POST['usuariotxt'];
		$alm->Correo = $_POST['correotxt'];
		$alm->Contraseña = $_POST['contraseñatxt'];
		$alm->Telefono = $_POST['telefonotxt'];
		$alm->id > 0 ? $this->Registro->actualizarDatos($alm) : $this->Registro->guardar($alm);
		//header("location: formulario.php");
		require_once "View/inicio.php";
	  }

}

?>