<?php
    class compra 
    {
            public $CNX;
            public $Id_compra;
            public $fecha;
            public $Id_pedido;

            //contructor que enlaza la conexion
            public function __construct() {
                try {
                    $this->CNX = conexion::conectar();
                } catch (Exception $e){
                    die($e->getMessage());
                }
            
            }

            public function guardarCompra($data){
                try {
                    $query = "INSERT INTO compra(Fecha,id_pedido) VALUES(?,?)";
                    $this->CNX->prepare($query)->execute(array($data->fecha,$data->Id_pedido));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    }
?>