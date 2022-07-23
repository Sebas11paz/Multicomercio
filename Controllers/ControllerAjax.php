<?php
require_once("./Models/DB.php");
require_once("./Models/Conexion.php");
require_once("./Controllers/Mensajes.php");
$url = urldecode($_SERVER["REQUEST_URI"]);
$peticion= explode("/", $url);
$controller = $peticion[2];
$accion = $peticion[3];
$parametro = isset($peticion[4])?$peticion[4]:"";
require_once("./Models/$controller.php");
require_once("./Interfaces/$controller.php");
$object = new $controller();
$respuesta = $object->$accion($parametro);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');
echo json_encode($respuesta);