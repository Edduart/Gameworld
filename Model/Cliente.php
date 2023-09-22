<?php
   // require_once("conexion.php");

    class registar //extends conexion
    {
            public $CNX;
            public $Id;
            public $Nombre;
            public $Usuario;
            public $Correo;
            public $Contraseña;
            public $Telefono;
            
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

            public function guardar($data){
                try {
                    $query = "INSERT INTO `cliente` (`id_cliente`, `nombre`, `usuario`, `correo`, `contraseña`, `telefono`) values(?,?,?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Nombre,$data->Usuario,$data->Correo,$data->Contraseña,$data->Telefono));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
           /* public function actualizarDatos($data){
                try {
                    $query = "UPDATE registro set nombreR=?,apellidoR=?,cedula=?,dirección=?,email=?,clave=? WHERE id=?";
                    $this->CNX->prepare($query)->execute(array($data->nombreR,$data->apellidoR,$data->cedula,$data->dirección,$data->email,$data->clave,$data->id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            //funcion de eliminar a futuro
            public function delete ($id){
                try {
                    $query = "Delete from registro where id =?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }*/
        //funcion que hace que cargue los id del registro para que la funcion
        //modificar funcione
            public function cargarId($id){
                try {
                    $query = "SELECT * from cliente where id=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            //verifica los registros 
            /*public function verificarCredenciales($email){
                try{
                $this->nombre = $email;
                $query = "SELECT * FROM registro WHERE tienda='$this->nombreR'";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                $usuarioEncontrado = $resultado->fetchAll(PDO::FETCH_OBJ);
                return $usuarioEncontrado;
            } catch (Exception $e){
                die ($e->getMessage());
            }*/
        }

         



?>