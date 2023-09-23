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
          /*  public function listar(){
                try{
                $query = "SELECT z.id,z.nombreR,z.apellidoR,z.cedula,z.dirección,z.email,z.clave FROM registro z ORDER BY z.id";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e){
                die ($e->getMessage());
            }
            //funcion  guardar para el registro
            }*/

          /*  public function cargarId($Id){
                try {
                    $query = "SELECT * from cliente where id=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }*/

            public function guardar($data){
                try {
                    $query = "INSERT INTO producto(Nombre_Producto, Descripcion) VALUES(?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Nombre_p,$data->Descripcion));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
           /* public function actualizarDatos($data){
                try {
                    $query = "UPDATE cliente set nombre=?,usuario=?,correo=?,contraseña=?,telefono=? WHERE id=?";
                    $this->CNX->prepare($query)->execute(array($data->Nombre,$data->Usuario,$data->Correo,$data->Contraseña,$data->Telefono,$data->Id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }*/
            //funcion de eliminar a futuro
            /*public function delete ($id){
                try {
                    $query = "Delete from cliente where id =?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }*/
        //funcion que hace que cargue los id del registro para que la funcion
        //modificar funcione

            //verifica los registros 

    }
?>