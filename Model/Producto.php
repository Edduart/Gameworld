<?php
   //require_once("conexion.php");

    class producto //extends conexion
    {
            public $CNX;
            public $Id;
            public $Nombre_p;
            public $Id_categoria;
            public $Descripcion;



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
                $query = "SELECT z.ID_Producto,z.Nombre_Producto,z.ID_catergoria,z.Descripcion FROM producto z ORDER BY z.ID_Producto";
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
                    $query = "INSERT INTO producto(Nombre_Producto, Descripcion) VALUES(?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_p,$data->Descripcion));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
            public function actualizarDatos($data){
                try {
                    $query = "UPDATE producto set Nombre_Producto=?,Descripcion=? WHERE ID_Producto=?";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_p,$data->Descripcion));
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
        //funcion que hace que cargue los id del registro para que la funcion
        //modificar funcione

            //verifica los registros 

    }
?>