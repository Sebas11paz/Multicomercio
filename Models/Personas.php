<?php
class PersonasModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="personas";
    }
    public function guardar(array $data)
    {
        $atributos = "(dni, apellidos, nombres, email, celular, direccion)";
        $datos = "?, ?, ?, ?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $data);
        return $insert;
    }
    public function listar(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function listarClientes(){
        $atributos="personas.*, usuarios.rol, usuarios.id_persona";
        $addquery=" Join usuarios ON personas.dni = usuarios.id_persona WHERE rol = 'cliente'";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getPersona(String $dni){
        $atributos="*";
        $addquery=" WHERE dni='$dni'";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function actualizar(array $cliente, $dni){
        $datos = "dni='$cliente[0]', apellidos='$cliente[1]', nombres='$cliente[2]', email='$cliente[3]', celular='$cliente[4]', direccion='$cliente[5]'";
        $addquery=" WHERE dni='$dni'";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
}