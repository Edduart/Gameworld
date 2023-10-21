<?php
include_once "Controller/Control.php";

if(isset($_SESSION['carrito']) || isset($_POST['nombre_product'])){
    if(isset($_SESSION['carrito'])){
        $carrito_mio = $_SESSION['carrito'];
        if(isset($_POST['nombre_product'])){
            $nombre = $_POST['nombre_product'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $donde = -1;
            if($donde != -1){
                $cuanto = $carrito_mio[$donde]['cantidad'] + $cantidad;
                $carrito_mio[$donde] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
            }else{
                $carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
            }
        }    
    }else{
        $nombre = $_POST['nombre_product'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
    }
    $_SESSION['carrito']= $carrito_mio;
}
    $mando = new control();
    $mando->PrincipalUser();
   /* header("Location: View/Usuario/Principal_login.php"); // Reemplaza "http://www.ejemplo.com/direccion" con la dirección a la que deseas redirigir
    exit;*/
/*header("location: ".$_SERVER['HTTP_REFERER']."");*/


/*if(isset($_SESSION['carrito'] || isset($_POST['nombre_product']))){
    if(isset($_SESSION['carrito'])){
        $carrito_mio = $_SESSION['carrito'];
        if(isset($_POST['nombre_product'])){
            $nombre = $_POST['nombre_product'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $donde = -1;
            if($donde != -1){
                $cuanto = $carrito_mio[$donde]['cantidad'] + $cantidad;
                $carrito_mio[$donde] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
            }else{
                $carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
            }
        }    
    }else{
        $nombre = $_POST['nombre_product'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $carrito_mio[] = array("nombre_product"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio, "cantidad"=>$cantidad);
    }
    $_SESSION['carrito']= $carrito_mio;
}

header("location: ".$_SERVER['HTTP_REFERER']."");*/
?>