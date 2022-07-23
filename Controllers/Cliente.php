<?php
require_once("recursos.php");
class Cliente{
    public $usuario;
    function __construct()
    {
        $modelo= new Catalogos();
        $this->catalogos=$modelo->getTodos();
        if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="cliente"){
            $this->usuario = $_SESSION["usuario"];
        }else{
            header("location:/");
        }
    }
    function index(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/inicio.php");
    }
    function perfil(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/Usuario/perfil.php");
    }
    function pedidos(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/Usuario/pedidos.php");
    }
}