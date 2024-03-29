<?php
include_once "Model/Cliente.php";
include_once "Model/Producto.php";
include_once "Model/Pedido.php";
include_once "Model/Category.php";
include_once "Model/pago.php";
include_once "Model/Metodo.php";
include_once "Model/Envio.php";
include_once "Model/Compra.php";
require "SesionControl.php";

$start_sesion = new SesionControl;

class control{

	public $Usuario;
	public $Product;
	public $Pedido;
	public $Category;
	public $pago;
	public $metodo;
	public $envio;
	public $compra;

    public function __construct(){
		$this->pago = new pago();
		$this->Usuario = new cliente();
		$this->Product = new producto();
		$this->Pedido = new pedido();
		$this->Category = new categoria();
		$this->metodo = new metodo();
		$this->envio = new envio();
		$this->compra = new compra();
	}

	public function registrar(){
		//$_SESSION['error_message'] = null;
		$alm = new cliente();
		$alm->Id = $_POST['txtId'];
		$alm->Username = $_POST['TxtUsername'];
		$alm->Email = $_POST['TxtEmail'];
		$alm->Nombre = $_POST['TxtNombre'];
		$alm->Telefono = $_POST['TxtTelefono'];

		$error = -1;

		$persona = $this->Usuario->misregistros();

		foreach($persona as $registro){
			if($alm->Username == $registro->usuario || $alm->Email == $registro->correo || $alm->Telefono == $registro->telefono){
				$error = 1;
				break;
			}if(!is_numeric($alm->Telefono)){
				$error = 1;
			} else {
				$error = 0;
			}
		}

		if ($alm->Id > 0) {
			$this->Usuario->actualizarDatos($alm);
			$_SESSION['error_message'] = '¡Datos de usuario actualizados!';
			include_once "View/Usuario/Principal_cliente_acc.php";
		} else {
			if($error){
				if($alm->Username == $registro->usuario ){
					$_SESSION['error_message'] = '¡Este nombre ya ha sido seleccionado!';
				}if($alm->Email == $registro->correo){
					$_SESSION['error_message'] = '¡Este correo ya existe!';
				}if($alm->Telefono == $registro->telefono){
					$_SESSION['error_message'] = '¡Este contacto ya fue registrado!';
				}if(!is_numeric($alm->Telefono)){
					$_SESSION['error_message'] = '¡La casilla de telefono solo se permite caracteres numericos!';
				}

				include_once "View/Registro.php";
				$_SESSION['error_message'] == null;
			}else{
				$alm->Contraseña = $_POST['TxtContraseña'];
				$this->Usuario->guardar($alm);
				$_SESSION['error_message'] = "¡Usuario Registrado exitosamente!";
				include_once "View/login.php";
			}

		}
        
		$_SESSION['error_message'] = null;
	}

	public function regist_product(){
		//$_SESSION['error_message'] = null;
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			// Acceder a la información del archivo cargado
			$file = $_FILES['fileImagen'];

			// Comprobar si se cargó un archivo
			if ($file['error'] === UPLOAD_ERR_OK) {
				// Ruta donde se guardarán las imágenes (puedes personalizarla)
				$uploadDirectory = 'Resources/Productos/';
	
				// Nombre del archivo (puedes personalizarlo)
				$fileName = uniqid() . '_' . $file['name'];
	
				// Mover la imagen al directorio de destino
				$uploadPath = $uploadDirectory . $fileName;

				if (move_uploaded_file($file['tmp_name'], $uploadPath)){
					//Se utiliza para mover a la dirección indicada en la variable $uploadPath

					$imageUrl = $uploadDirectory . $fileName;
                    //Esto ultimo se utiliza para transformar el archivo de la imagen a un url
				}
		    }
		}	

		$alm = new producto();
		$alm->Nombre_p = $_POST['TxtNproducto'];
		$alm->Descripcion = $_POST['TxtDescripcion'];
		$alm->Precio = $_POST['TxtPrecio'];
		$alm->Id_categoria = $_POST['TxtCategoria'];
		$alm->Image_URL = $imageUrl;
		$error = 0;

		$mercado = $this->Product->misproductos();
		foreach($mercado as $mercancia){
			if($alm->Nombre_p == $mercancia->Nombre_Producto & $alm->Precio == $mercancia->Precio){
				$error = 1;
				break;
			}if(!is_numeric($alm->Precio)){
				$error = 0;
			}
		}
		//var_dump($mercancia);
		if($error){
			if($alm->Nombre_p == $mercancia->Nombre_Producto & $alm->Precio == $mercancia->Precio){
				$_SESSION['error_message'] = "¡El producto no puede tener el precio repetido!";
				include_once "View/Admin/Registro_Product.php";
			}/*if(!is_numeric($alm->Precio)){
				$_SESSION['error_message'] = "¡La casilla de precio solo acepta caracteres numericos!";
				include_once "View/Admin/Registro_Product.php";
			}*/
		}else{

			$descrip = "Creacion de producto nuevo = $alm->Nombre_p";
			$this->Usuario->guardarBitacora($descrip);
			$this->Product->guardar($alm);
			include_once "View/Admin/Admin.php";
		}
	}

	public function regist_categoria(){
		//$_SESSION['error_message'] = null;

		$alm = new categoria();
		$alm->Nombre_c = $_POST['TxtNcategoria'];
		$alm->Plataforma = $_POST['TxtPlataforma'];
		$alm->Descripcion = $_POST['TxtDescripcion'];
		$error=0;

		$descrip = "Creacion de categoria nueva = $alm->Nombre_c";
		$this->Usuario->guardarBitacora($descrip);
		$this->Category->guardar($alm);
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
					$descrip = "Inicio de sesion = Admin";
					$this->Usuario->guardarBitacora($descrip);
				} 
				elseif ($Uencontrado->usuario !== "admin")
				{
					include_once "View/Usuario/Principal_login.php";
				}
			} else {
				// Credenciales inválidas, mostrar un mensaje de error o redirigir a la página de inicio de sesión
				$_SESSION['error_message'] = '¡Credenciales invalidas!';
				$this->sesion();
				$_SESSION['error_message'] = null;
			}
		} else {
			$_SESSION['error_message'] = '¡Credenciales invalidas!';
			$this->sesion();
			$_SESSION['error_message'] = null;
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
		if ($_SESSION['nombre'] == "admin") 
		{
			$descrip = "Cerro sesion = Admin";
			$this->Usuario->guardarBitacora($descrip);
		}
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
		$prd = $_REQUEST['ID_Producto'];
		$this->Product->delete($_REQUEST['ID_Producto']);
		$descrip = "Se elimino el producto ID = $prd";
		$this->Usuario->guardarBitacora($descrip);

		include_once "View/Admin/List_Product.php";
	}

	public function dCliente(){

		$cli = $_REQUEST['id_cliente'];
		$this->Usuario->delete($_REQUEST['id_cliente']);
		$descrip = "Se elimino el cliente ID = $cli";
		$this->Usuario->guardarBitacora($descrip);

		include_once "View/Admin/List_Client.php";
	}

	public function carrito(){
		if(isset($_SESSION['carrito']) || isset($_POST['nombre_product'])){
    
			if(isset($_SESSION['carrito'])){
		
				$carrito_mio = $_SESSION['carrito'];
		
				if(isset($_POST['nombre_product'])){
		
					$nombre = $_POST['nombre_product'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$imagen = $_POST['img'];
					$cantidad = $_POST['cantidad'];
					$id_producto = $_POST['id_producto'];
		
					$carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "img"=>$imagen, "cantidad"=>$cantidad, "id_producto"=>$id_producto);
				}
			}else{
				$nombre = $_POST['nombre_product'];
				$descripcion = $_POST['descripcion'];
				$precio = $_POST['precio'];
				$imagen = $_POST['img'];
				$cantidad = $_POST['cantidad'];
				$id_producto = $_POST['id_producto'];
				$carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "img"=>$imagen, "cantidad"=>$cantidad, "id_producto"=>$id_producto);
			}
			$_SESSION['carrito'] = $carrito_mio;
		}
		include_once "View/Usuario/Principal_login.php";
	} 
	public function crearPedido(){

		// Obtener los arreglos de productos desde $_POST
		$id_productos = $_POST['TxtId_producto'];
		$id_clientes = $_POST['TxtId_cliente'];
		$id_pagos = $_POST['TxtId_pago'];
		$precios = $_POST['Txtprecio'];
		$pedidoN = $_POST['TxtpedidoN'];
		$estatus = $_POST['TxtEstatus'];

		$compraPedido[] = array("id_pago"=>$_POST['TxtId_pago'],"fecha"=>date("Y-m-d"), "cantidad"=>$_POST['Txtcantidad'], "precioTotal"=>$_POST['TxtprecioT'], "correo_envio"=>$_SESSION['correo'],"id_cliente"=>$_SESSION['id'],"pedidoN"=>$pedidoN[0]);
		$_SESSION['pedido'] = $compraPedido;
		// Iterar sobre los arreglos y guardar cada producto en la base de datos
		foreach ($id_productos as $key => $id_producto) {
			$alm = new pedido();
			$alm->Id_producto = $id_producto;
			$alm->Id_cliente = $id_clientes[$key];
			$alm->Id_pago = $id_pagos[$key];
			$alm->Precio_total = $precios[$key];
			$alm->pedidoN = $pedidoN[$key];
			$alm->estatus = $estatus[$key];

			$this->Pedido->guardar($alm);
		}
		$this->Mipedido();
	}

	public function PagoTDD() {

		$pago = $_SESSION['pedido'];
		$id_metodo = rand(1,10000);

		foreach ($pago as $i) {}

		$alm = new pago();
		$alm->Id_pago = $i['id_pago'][0];
		$alm->Id_metodo = $id_metodo;
		$alm->monto = $i['precioTotal'];
		$alm->status = true;

		$this->pago->guardarPago($alm);

		$alm1 = new metodo();
		$alm1->Id_metodo = $id_metodo;
		$alm1->tipo = $_POST['TxtTipo'];
		$alm1->dato = $_POST['TxtNumero'];
		$alm1->description = $_POST['TxtDescripcion'];

		$this->metodo->guardarMetodo($alm1);
		
		$id_pedido = $this->Pedido->pedidos($i['pedidoN']);

		foreach ($id_pedido as $j) {}

		$alm3 = new envio();
		$alm3->Id_pedido = $j->Id_pedido;
		$alm3->descripcion = $_POST['TxtDescripcionEnvio'];
		$alm3->status = true;

		$this->envio->guardarEnvio($alm3);

		$alm4 = new compra();

		$alm4->fecha = $i['fecha'];
		$alm4->Id_pedido = $j->Id_pedido;

		$this->compra->guardarCompra($alm4);
		$this->Pedido->estatus($i['pedidoN']);

		$_SESSION['error_message'] = "Compra exitosa, los datos se enviaran al correo del usuario!";
		$this->PrincipalUser();
		$_SESSION['error_message'] = null;

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
	
	public function Mipedido(){
		include_once "View/Usuario/Pedido.php";
	}

	public function MetodoPagos(){
		include_once "View/Usuario/MetodoPagos.php";
	}

	public function Micategoria(){
		include_once "View/Admin/Categoria.php";
	}

	public function Misventas(){
		include_once "Reporte_venta.php";
	}
	public function Bitacora(){
		include_once "View/Admin/Bitacora.php";
	}

}
