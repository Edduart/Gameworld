<?php
   //require_once("conexion.php");

    class producto //extends conexion
    {
            public $CNX;
            public $Id;
            public $Nombre_p;
            public $Id_categoria;
            public $Descripcion;
            public $Precio;
            public $Image_URL;

            //contructor que enlaza la conexion
            public function __construct() {
                try {
                    $this->CNX = conexion::conectar();
                } catch (Exception $e){
                    die($e->getMessage());
                }
            
            }
            //en lista los insert join que se hizo en sql
            public function listar(){
                try{
                $query = "SELECT z.ID_Producto,z.Nombre_Producto,z.ID_catergoria,z.Descripcion,z.Precio,z.Image_URL FROM producto z ORDER BY z.ID_Producto";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
             }

            public function cargarId($Id){
                try {
                    $query = "SELECT * from producto where ID_Producto=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            public function guardar($data){
                try {
                    $query = "INSERT INTO producto(Nombre_Producto, ID_Catergoria, Descripcion, Precio, Image_URL) VALUES(?,?,?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_p,$data->Id_categoria,$data->Descripcion,$data->Precio,$data->Image_URL));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
            public function actualizarDatos($data){
                try {
                    $query = "UPDATE producto set Nombre_Producto=?,ID_Catergoria,Descripcion=?,Precio=?,Image_URL=? WHERE ID_Producto=?";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_p,$data->ID_categoria,$data->Descripcion,$data->Precio,$data->Image_URL));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            //funcion de eliminar a futuro
            public function delete ($Id){
                try {
                    $query = "Delete from producto where ID_Producto =?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            public function obtenerProductos() {
                try{
                    $query = "SELECT * FROM producto ORDER BY Nombre_Producto";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
            }

            public function misproductos(){
                try {
                    $query = "SELECT * from producto";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            public function obtenerProductosSearch($data) {
                try{
                    $query = "SELECT * FROM producto WHERE $data";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
            }
    }
?>