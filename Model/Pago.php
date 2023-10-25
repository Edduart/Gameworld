<?php

    class pago 
    {
            public $CNX;
            public $Id_pago;
            public $Id_metodo;
            public $monto;
            public $status;


            //contructor que enlaza la conexion
            public function __construct() {
                try {
                    $this->CNX = conexion::conectar();
                } catch (Exception $e){
                    die($e->getMessage());
                }
            
            }

            public function guardarPago($data){
                try {
                    $query = "INSERT INTO pago(Id_metodo, Monto, Estatus_pago) VALUES(?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Id_pago,$data->Id_metodo,$data->monto,$data->estatus));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    }
?>