<?php
class PedidosModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="pedidos";
    }
    public function guardar($data)
    {
        $atributos = "(id_cliente, fecha, costo_total, estado)";
        $datos = "?, ?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $data);
        return $insert;
    }
    public function pedidoSinCliente($data)
    {
        $atributos = "(fecha, costo_total, estado)";
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
    public function getPedidosCliente($dni){
        $atributos="*";
        $addquery=" WHERE id_cliente='$dni'";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getPedidosSinClientes(){
        $atributos="*";
        $addquery=" WHERE id_cliente IS NULL";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getPedidosPendientes(){
        $atributos="*";
        $addquery=" WHERE estado='pendiente' AND id_cliente IS NOT NULL";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getPedidosDespachados(){
        $atributos="*";
        $addquery=" WHERE estado='despachado' AND id_cliente IS NOT NULL";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getPedido(Int $id){
        $atributos="*";
        $addquery=" WHERE id_pedido=$id";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getId(){
        $atributos="MAX(id_pedido) AS id";
        $addquery="";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta[0];
    }
    public function actualizar(Float $costo, Int $id){
        $datos = "costo_total=$costo";
        $addquery=" WHERE id_pedido=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function despacharPedido($id){
        $datos = "estado='despachado'";
        $addquery=" WHERE id_pedido=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
}