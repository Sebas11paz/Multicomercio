<?php
class CatalogosModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="catalogos";
    }
    public function guardar($nombre)
    {
        $atributos = "(nombre)";
        $datos = "?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, [$nombre]);
        return $insert;
    }
    public function listar(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getCatalogo($id){
        $atributos="*";
        $addquery=" WHERE id_catalogo=$id";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function actualizar(String $nombre, Int $id){
        $datos = "nombre='$nombre'";
        $addquery=" WHERE id_catalogo=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
}