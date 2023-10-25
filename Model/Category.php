<?php
   //require_once("conexion.php");

    class categoria //extends conexion
    {
            public $CNX;
            public $Id;
            public $Nombre_c;
            public $Plataforma;
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
                $query = "SELECT z.ID_categoria,z.Nombre,z.Plataforma,z.Descripcion FROM categoria z ORDER BY z.ID_categoria";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e){
                die ($e->getMessage());
            }
        }

           /* public function cargarId($Id){
                try {
                    $query = "SELECT * from producto where ID_Producto=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }*/

            public function guardar($data){
                try {
                    $query = "INSERT INTO categoria(Nombre, Plataforma, Descripcion) VALUES(?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_c,$data->Plataforma,$data->Descripcion));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
           /* public function actualizarDatos($data){
                try {
                    $query = "UPDATE categoria set Nombre=?, Plataforma=?, Descripcion=? WHERE ID_categoria=?";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_c,$data->Plataforma,$data->Descripcion));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }*/
            //funcion de eliminar a futuro
           /* public function delete ($Id){
                try {
                    $query = "Delete from categoria where ID_categoria =?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }*/
           /* public function obtenercategorias() {
                try{
                    $query = "SELECT * FROM categoria ORDER BY Nombre";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
            }*/

            /*public function miscategorias(){
                try {
                    $query = "SELECT * from categoria";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }*/
    }
?>