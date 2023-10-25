<?php

    class envio 
    {
            public $CNX;
            public $Id_envio;
            public $Id_pedido;
            public $descripcion;
            public $status;


            //contructor que enlaza la conexion
            public function __construct() {
                try {
                    $this->CNX = conexion::conectar();
                } catch (Exception $e){
                    die($e->getMessage());
                }
            
            }

            public function guardarEnvio($data){
                try {
                    $query = "INSERT INTO envio(Id_pedido,descripcion,estatus) VALUES(?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Id_pedido,$data->description,$data->status));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    }
?>