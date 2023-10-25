<?php

    class metodo 
    {
            public $CNX;
            public $Id_metodo;
            public $tipo;
            public $dato;
            public $description;


            //contructor que enlaza la conexion
            public function __construct() {
                try {
                    $this->CNX = conexion::conectar();
                } catch (Exception $e){
                    die($e->getMessage());
                }
            
            }

            public function guardarMetodo($data){
                try {
                    $query = "INSERT INTO metodo_de_pago(Id_metodo,Tipo,Dato,Descripcion) VALUES(?,?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Id_metodo,$data->tipo,$data->dato,$data->description));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    }
?>