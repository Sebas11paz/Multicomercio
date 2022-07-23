<?php

class RouterApi
{
    public $routes;
    public function add($ruta, $accion){
        $this->routes[$ruta]=$accion;
    }
    public function runRecurso(){
        $this->run();
    }
    public function run(){
        $ruta_recurso= $_SERVER["REQUEST_URI"];
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        $parametros = isset($url[3])? $url[3]:"";
        if(array_key_exists($ruta_recurso, $this->routes)){
            $metodo = $_SERVER['REQUEST_METHOD'];
            $recurso=$this->routes[$ruta_recurso];
            $recurso = new $recurso();
            $response=$recurso->$metodo($parametros);
            include_once("./AppApi/Cors.php");
            echo json_encode($response);
        }
        else{
            echo json_encode("Error 4004. Recurso no disponible (´･_･`) ");
        }
    }
}