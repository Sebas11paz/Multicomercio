<?php
require_once("recursos.php");
require_once("./Controllers/SessionController.php");
class Invitado{
    public $catalogos;
    function __construct()
    {
        if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="cliente"){
            $this->usuario = $_SESSION["usuario"];
        }
        $modelo= new Catalogos();
        $this->catalogos=$modelo->getTodos();
    }
    function index(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/inicio.php");
    }
    function catalogos($tipo){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/catalogos.php");
    }
    function  quienesSomos(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/quienesSomos.php");
    }
    function productos($busqueda){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/productos.php");
    }
    function productosCategoria($busqueda){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/productos.php");
    }
    function registro(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/registro.php");
    }
    function login(){
        if(isset($_SESSION["rol"])){
            if($_SESSION["rol"]=="propietario"){
                header("location:/gestion/marcas");
                exit;
            }
            if($_SESSION["rol"]=="cliente"){
                header("location:/inicio");
                exit;
            }
        }
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/login.php");
    }
    function cotizar(){
        $catalogos=$this->catalogos;
        include_once("./Views/Cliente/cotizar.php");
    }
}