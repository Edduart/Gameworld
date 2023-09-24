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
		if ($_POST['txtContraseña'] != null) {
			$alm->Contraseña = $_POST['TxtContraseña'];
		}
		$alm->Nombre = $_POST['TxtNombre'];
		$alm->Telefono = $_POST['TxtTelefono'];

		if ($alm->Id > 0) {
			$this->Usuario->actualizarDatos($alm);
		} else {
			$this->Usuario->guardar($alm);
		}
		
		include_once "View/login.php";
	}

	public function regist_product(){
		//$_SESSION['error_message'] = null;
		$alm = new producto();
		$alm->Nombre_p = $_POST['TxtNproducto'];
		$alm->Descripcion = $_POST['TxtDescripcion'];
		$this->Product->guardar($alm);
		include_once "View/login.php";
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
			}else{
				$_SESSION['error_message'] = 'Credenciales invalidas!';
				include_once "View/index.php";
			}
				/* Si utilizo hash
				if(password_verify($clave,$encontrado->clave)){
					echo "verificado";
				}*/
		} 
		else
		{
			//$_SESSION['error_message'] = 'Credenciales invalidas!';
			include_once "View/index.php";
			// Credenciales inválidas, mostrar un mensaje de error o redirigir a la página de inicio de sesión
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

	//Funciones de redireccion ***** hay que organizar

	public function index(){
		include_once "View/Principal.php";
	}

	public function sesion(){
		include_once "View/login.php";
	}

    public function Registro(){
		include_once "View/Registro.php";
	}

	public function Product(){
		include_once "View/Registro_Product.php";
	}

	public function seguridad(){
		include_once "View/Usuario/Principal_cliente_seguridad.php";
	}

	public function seguridadCheck(){

		$password = $_POST['TxtContraseña'];
		$newPassword = $_POST['TxtContraseñaNueva'];
		$contraseñaUsuario = $this->Usuario->verificarContraseña($_SESSION['id']);
		foreach($contraseñaUsuario as $contraseñaValida){}

		// Verificar las credenciales del usuario

		if ($password == $contraseñaValida->contraseña) {
			$alm = new cliente;
			$alm->Id = $_SESSION['id'];
			$alm->Contraseña = $newPassword;
			$this->Usuario->actualizarContraseña($alm);
			include_once "View/Usuario/Principal_cliente_seguridad.php";
		} else {
			var_dump($contraseñaValida);
			include_once "View/Usuario/Principal_cliente_seguridad.php";
		}

	}

	public function ActProducto(){
		$alm = new producto();
		if(isset($_REQUEST['ID_Producto'])){
			$alm = $this->Product->cargarId($_REQUEST['ID_Producto']);
		}
		include_once "View/Edit_Product.php";
	}

	public function dProducto(){

		$this->Product->delete($_REQUEST['ID_Producto']);

		header("Location: index.php");
	}

}

?>