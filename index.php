<?php
include_once "Controller/Control.php";
include_once "Config/conexion.php";

$Controller = new control();

if(!isset($_REQUEST['resp'])){
	$Controller->index();
}else{
	$action = $_REQUEST['resp'];
	call_user_func(array($Controller, $action));
}
?>