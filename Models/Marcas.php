<?php
class MarcasModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="marcas";
    }
    public function guardar($data)
    {
        $atributos = "(nombre, dirurl, img)";
        $datos = "?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $data);
        return $insert;
    }
    public function listar(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getMarca($id){
        $atributos="*";
        $addquery=" WHERE id_marca=$id";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function actualizar($data, Int $id){
        $datos = "nombre='$data[0]', dirurl='$data[1]'";
        $addquery=" WHERE id_marca=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function borrar(Int $id){
        $addquery=" WHERE id_marca=$id";
        $respuesta=$this->pd->eliminar($this->tabla, $addquery);
        return $respuesta;
    }
}