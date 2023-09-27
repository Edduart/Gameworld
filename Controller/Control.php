<?php
include_once "Model/Cliente.php";
include_once "Model/Producto.php";
require "SesionControl.php";

$start_sesion = new SesionControl;

class control{

	public $Usuario;
	public $Product;

    public function __construct(){
		$this->Usuario = new cliente();
		$this->Product = new producto();
	}

	public function registrar(){
		//$_SESSION['error_message'] = null;
		$alm = new cliente();
		$alm->Id = $_POST['txtId'];
		$alm->Username = $_POST['TxtUsername'];
		$alm->Email = $_POST['TxtEmail'];
		$alm->Nombre = $_POST['TxtNombre'];
		$alm->Telefono = $_POST['TxtTelefono'];

		if ($alm->Id > 0) {
			$this->Usuario->actualizarDatos($alm);
			$_SESSION['error_message'] = '¡Datos de usuario actualizados!';
			include_once "View/Usuario/Principal_cliente_acc.php";
		} else {
			$alm->Contraseña = $_POST['TxtContraseña'];
			$this->Usuario->guardar($alm);
			$_SESSION['error_message'] = "¡Usuario Registrado exitosamente!";
			include_once "View/login.php";
		}
		$_SESSION['error_message'] = null;
	}

	public function regist_product(){
		//$_SESSION['error_message'] = null;
		$alm = new producto();
		$alm->Nombre_p = $_POST['TxtNproducto'];
		$alm->Descripcion = $_POST['TxtDescripcion'];
		$alm->Precio = $_POST['TxtPrecio'];
		$alm->Image_URL = $_POST['TxtImagen'];
		$this->Product->guardar($alm);
		include_once "View/Admin/Admin.php";
	}

	public function login()
	{
		$User = $_POST['TxtUsuario'];
		$password = $_POST['TxtClave'];
		// Verificar las credenciales del usuario
		$usuarioValido = $this->Usuario->verificarCredenciales($User);
		
		if ($usuarioValido) 
		{
			foreach($usuarioValido as $Uencontrado){}
			//var_dump($Uencontrado);
			if($password == $Uencontrado->contraseña)
			{
				//Inicio de sesion
				$_SESSION['id'] = $Uencontrado->id_cliente;
				$_SESSION['nombre'] = $Uencontrado->usuario;
				$_SESSION['correo'] = $Uencontrado->correo;
				$_SESSION['error_message'] = null;

				//Si las credenciales son iguales a administrador o usuario cualquiera
				if($Uencontrado->usuario == "admin")
				{
					include_once "View/Admin/Admin.php";
				} 
				elseif ($Uencontrado->usuario !== "admin")
				{
					include_once "View/Usuario/Principal_login.php";
				}
			}
				/* Si utilizo hash
				if(password_verify($clave,$encontrado->clave)){
					echo "verificado";
				}*/
		} 
		else
		{
			// Credenciales inválidas, mostrar un mensaje de error o redirigir a la página de inicio de sesión
			$_SESSION['error_message'] = '¡Credenciales invalidas!';
			include_once "View/login.php";
			$_SESSION['error_message'] == null;
		}
	}

	// obtener informacion del usuario para actualizar
	public function obtenerInfo()
	{
		$currentUserId = $_SESSION['id'];
		$getData = $this->Usuario->cargarInfo($currentUserId);
		foreach($getData as $UserData);

		$alm = new cliente;
		$alm->Id = $_SESSION['id'];
		$alm->Username = $UserData->usuario;
		$alm->Email = $UserData->correo;
		$alm->Nombre = $UserData->nombre;
		$alm->Telefono = $UserData->telefono;

		include_once "View/Usuario/Principal_cliente_acc.php";
	}

	public function seguridadCheck(){

		$password = $_POST['TxtContraseña'];
		$newPassword = $_POST['TxtContraseñaNueva'];
		$contraseñaUsuario = $this->Usuario->verificarContraseña($_SESSION['id']);
		foreach($contraseñaUsuario as $contraseñaValida){}

		$alm = new cliente;
		$alm->Id = $_SESSION['id'];

		// Verificar las credenciales del usuario
		if (($password == $contraseñaValida->contraseña) && (isset($_REQUEST['check']) == true)) {
			//actualizar password
			$alm->Contraseña = $newPassword;
			$this->Usuario->actualizarContraseña($alm);
			$_SESSION['error_message'] = "Contraseña actualizada!";
			include_once "View/Usuario/Principal_cliente_seguridad.php";
		} elseif (($password == $contraseñaValida->contraseña)) {
			//Eliminar
			$this->Usuario->delete($alm->Id);
			include_once "View/Principal.php";
		} else {
			//contraseña invalida
			$_SESSION['error_message'] = "Contraseña invalida!";
			include_once "View/Usuario/Principal_cliente_seguridad.php";
		}
		$_SESSION['error_message'] = null;
	}

	public function CerrarSesion() {
		//Eliminar todas las variables de sesion
		session_unset();
		//Destruit la sesion
		session_destroy();
		$_SESSION['error_message'] = null;
		$this->index();
	}

	public function ActProducto(){
		$alm = new producto();
		if(isset($_REQUEST['ID_Producto'])){
			$alm = $this->Product->cargarId($_REQUEST['ID_Producto']);
		}
		include_once "View/Admin/Edit_Product.php";
	}

	public function ActCliente(){
		$alm = new cliente();
		if(isset($_REQUEST['id_cliente'])){
			$alm = $this->Usuario->cargarId($_REQUEST['id_cliente']);
		}
		include_once "View/Admin/Edit_Client.php";
	}

	public function dProducto(){

		$this->Product->delete($_REQUEST['ID_Producto']);

		include_once "View/Admin/List_Product.php";
	}

	public function dCliente(){

		$this->Usuario->delete($_REQUEST['id_cliente']);

		include_once "View/Admin/List_Client.php";
	}

	//Funciones de redireccion ***** hay que organizar

	public function index(){
		include_once "View/Principal.php";
	}

	public function sesion(){
		error_reporting(0);
		include_once "View/login.php";
	}

    public function Registro(){
		error_reporting(0);
		include_once "View/Registro.php";
	}

	public function Product(){
		include_once "View/Admin/Registro_Product.php";
	}

	public function Lista_Product(){
		include_once "View/Admin/List_Product.php";
	}

	public function Lista_Client(){
		include_once "View/Admin/List_Client.php";
	}

	public function seguridad(){
		include_once "View/Usuario/Principal_cliente_seguridad.php";
	}

	public function PrincipalUser(){
		include_once "View/Usuario/Principal_login.php";
	}

	public function PrincipalAdmin(){
		include_once "View/Admin/Admin.php";
	}
	

}

?>