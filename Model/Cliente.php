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
            public function cargarInfo($data){
                try{
                $query = "SELECT nombre,usuario,correo,telefono FROM cliente where id_cliente = $data";
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
                    $query = "SELECT * from cliente where id_cliente=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            public function misregistros(){
                try {
                    $query = "SELECT * from cliente";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            public function listar(){
                try{
                $query = "SELECT z.id_cliente,z.usuario,z.correo,z.contraseña,z.nombre,z.telefono FROM cliente z ORDER BY z.id_cliente";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e){
                die ($e->getMessage());
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
                    $query = "UPDATE cliente set usuario=?,correo=?,nombre=?,telefono=? WHERE id_cliente=?";
                    $this->CNX->prepare($query)->execute(array($data->Username,$data->Email,$data->Nombre,$data->Telefono,$data->Id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            //funcion de eliminar a futuro
            public function delete ($id){
                try {
                    $query = "DELETE FROM cliente WHERE id_cliente=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($id));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

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

        //Verificacion de contraseña para actualizacion
        public function verificarContraseña($Id){
            try{
            $this->Id = $Id;
            $query = "SELECT contraseña FROM cliente WHERE id_cliente='$this->Id'";
            $resultado = $this->CNX->prepare($query);
            $resultado->execute();
            $Ucontraseña = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $Ucontraseña;
            } catch (Exception $e){
                die ($e->getMessage());
            }
        }
        public function actualizarContraseña($data){
            try {
                $query = "UPDATE cliente set contraseña=? WHERE id_cliente=?";
                $this->CNX->prepare($query)->execute(array($data->Contraseña,$data->Id));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // registro bitacora

        public function guardarBitacora($data){
            try {
                $query = "INSERT INTO bitacora_admin(Descripcion) VALUES(?)";
                $this->CNX->prepare($query)->execute(array($data));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>