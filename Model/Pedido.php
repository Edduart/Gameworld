<?php
   //require_once("conexion.php");

    class pedido //extends conexion
    {
            public $CNX;
            public $Id_pedido;
            public $Id_producto;
            public $Id_cliente;
            public $Id_pago;
            public $Precio_total;
            public $pedidoN;
            public $estatus;

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
                $query = "SELECT * FROM pedido";
                $resultado = $this->CNX->prepare($query);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e){
                die ($e->getMessage());
            }
            }

            public function cargarId($Id){
                try {
                    $query = "SELECT * from pedido where 	Id_pedido=?";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute(array($Id));
                    return $resultado->fetch(PDO::FETCH_OBJ);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        
            }

            public function guardar($data){
                try {
                    $query = "INSERT INTO pedido(Id_producto, id_cliente, Id_pago, Precio_total, pedidoN, estatus) VALUES(?,?,?,?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Id_producto,$data->Id_cliente,$data->Id_pago,$data->Precio_total,$data->pedidoN,$data->estatus));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            public function guardarPago($data){
                try {
                    $query = "INSERT INTO pago(Id_metodo, Monto, Estatus_pago) VALUES(?,?,?)";
                    $this->CNX->prepare($query)->execute(array($data->Id_producto,$data->Id_cliente,$data->Id_pago,$data->Precio_total,$data->pedidoN,$data->estatus));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }

            public function pedidos($data){
                try{
                    $query = "SELECT * FROM pedido WHERE PedidoN = $data";
                    $resultado = $this->CNX->prepare($query);
                    $resultado->execute();
                    return $resultado->fetchAll(PDO::FETCH_OBJ);
                } catch (Exception $e){
                    die ($e->getMessage());
                }
            }

            public function estatus($data){
                    try {
                        $query = "UPDATE pedido set estatus = true WHERE pedidoN = $data";
                        $this->CNX->prepare($query)->execute();
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
            }
            
    }
?>