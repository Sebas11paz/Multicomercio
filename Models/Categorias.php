<?php
class CategoriasModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="categorias";
    }
    public function guardar($data)
    {
        $atributos = "(id_catalogo, nombre, img_cat)";
        $datos = "?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $data);
        return $insert;
    }
    public function listar(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, "catalogo_categoria", $addquery);
        return $respuesta;
    }
    public function getCategoria($id){
        $atributos="*";
        $addquery=" WHERE id_categoria=$id";
        $respuesta=$this->pd->read($atributos, "catalogo_categoria", $addquery);
        return $respuesta;
    }
    public function actualizar(String $nombre, Int $id){
        $datos = "nombre='$nombre'";
        $addquery=" WHERE id_categoria=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function categoriasCatalogo($tipo){
        $atributos="*";
        $addquery=" WHERE nombre='$tipo' OR catalogo='$tipo'";
        $respuesta=$this->pd->read($atributos, "catalogo_categoria", $addquery);
        return $respuesta;
    }
    public function actualizarImagen(Int $id, $imagen){
        $datos = "img_cat='$imagen'";
        $addquery=" WHERE id_categoria=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
}