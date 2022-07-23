<?php
class Router
{
    public $routes;
    public function add($ruta, $controller)
    {
        $this->routes[$ruta] = $controller;
    }
    public function runRender()
    {
        $this->render();
    }
    public function render()
    {
        $path = urldecode($_SERVER["REQUEST_URI"]);
        $url = explode("/",  $path);
        $vista = $_SERVER["REQUEST_URI"];
        if($url[1]=="catalogo"){
            $accion = $this->routes["/".$url[1]];
            $accion = explode("->", $accion);
            $controller=$accion[0];
            $function = $accion[1];
            $object = new $controller();
            if(count($url)==2){
                $object->productos();
            }
            $tipo = $url[2];
            $object->$function($tipo);
           exit;
        }
        if ($url[1] == "ajax") {
            require_once("./Controllers/ControllerAjax.php");
        } else {
                $vista = $url[1]=="gestion" || $url[1]=="productos"?"/".$url[1]."/".$url[2]:$vista;
            if (array_key_exists($vista, $this->routes)) {
                $accion = $this->routes[$vista]; 
                $params = isset($url[3]) ? $url[3] : "";
                $accion = explode("->", $accion);
                $controller = $accion[0];
                $function = $accion[1];
                $object = new $controller();
                $object->$function($params);
            } else {
                include_once("./Views/Cliente/error.php");
            }
        }
    }
}
