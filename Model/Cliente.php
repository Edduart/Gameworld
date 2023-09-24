<?php

    class cliente //extends conexion
    {
            public $CNX;
            public $Id;
            public $Username;
            public $Nombre;
            public $Email;
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

            //Obtener los datos del cliente
            public function cargarInfo(){
                try{
                $query = "SELECT * FROM cliente";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
            }
            
            //ID cargada para actualizar
            public function cargarId($Id){
                try {
                    $query = "SELECT * from cliente where id=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            // Registro de cliente 
            public function guardar($data){
                try {
                    $query = "INSERT INTO cliente(usuario, correo, contraseña, nombre, telefono) VALUES(?,?,?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Username,$data->Email,$data->Contraseña,$data->Nombre,$data->Telefono));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            //actualizar para el registro a futuro
            public function actualizarDatos($data){
                try {
                    $query = "UPDATE cliente set nombre=?,usuario=?,correo=?,contraseña=?,telefono=? WHERE id=?";
                    $this->CNX->prepare($query)->execute(array($data->Nombre,$data->Usuario,$data->Correo,$data->Contraseña,$data->Telefono,$data->Id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            //funcion de eliminar a futuro
            public function delete ($id){
                try {
                    $query = "Delete from cliente where id =?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            //funcion que hace que cargue los id del registro para que la funcion
            //modificar funcione

            //verifica los registros 
            public function verificarCredenciales($Usuario){
                try{
                $this->Username = $Usuario;
                $query = "SELECT * FROM cliente WHERE usuario='$this->Username'";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                $usuarioEncontrado = $resultado->fetchAll(PDO::FETCH_OBJ);
                return $usuarioEncontrado;
            } catch (Exception $e){
                die ($e->getMessage());
            }
        }
    }
?>