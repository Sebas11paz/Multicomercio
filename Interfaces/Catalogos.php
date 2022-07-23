<?php
class Catalogos{
    private $modelo;
    function __construct()
    {
        $this->modelo = new CatalogosModel();
    }
    function getTodos(){
        $datos = $this->modelo->listar();
        return $datos;
    }
    function getCatalogo($param){
        $respuesta = $this->modelo->getCatalogo($param);
        return $respuesta;
    }
    function guardar(){
        $nombre=$_POST["nombre"];
        $respuesta = $this->modelo->guardar($nombre);
        $mensaje = $respuesta==1? Mensajes::msOK("Registro de catalogo") : Mensajes::msError("registrar catalogo");
        return $mensaje;
    }
    function actualizar($id){
        $nombre=$_POST["nombre"];
        $respuesta = $this->modelo->actualizar($nombre, $id);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de catalogo") : Mensajes::msError("actualizar catalogo");
        return $mensaje;
    }
    function GET($param){
        if($param==""){
            $data = $this->modelo->listar();
        }else{
            $data = $this->modelo->getCatalogo($param);
        }
        return $data;
    }
    function PUT(){
        
    }
}
