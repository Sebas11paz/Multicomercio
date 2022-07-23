<?php


class UsuariosModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="usuarios";
    }
    public function guardar(array $data)
    {
        $attr = "(usuario, contrasenia, rol, id_persona)";
        $datos = "?, ?, ?, ?";
        $respuesta = $this->pd->create($attr, $this->tabla, $datos, $data);
        return $respuesta;
    }
    public function listar(){
        $attr="*";
        $where="";
        $consulta=$this->pd->read($attr, $this->name_table, $where);
        return $consulta;
    }
    public function consultarUsuario($usuario){
        $attr="*";
        $where=" WHERE usuario='$usuario'";
        $consulta=$this->pd->read($attr, $this->tabla, $where);
        return $consulta;
    }
    public function actualizar($email, $dni){
        $datos = "usuario='$email'";
        $addquery=" WHERE id_persona='$dni'";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function actualizarPassword($dni, $contrasenia){
        $datos = "contrasenia='$contrasenia'";
        $addquery=" WHERE id_persona='$dni'";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
}