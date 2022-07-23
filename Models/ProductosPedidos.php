<?php
class ProductosPedidosModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="productos_pedidos";
    }
    public function addProducto(array $data)
    {
        $atributos = "(pedido, producto, precio, cantidad)";
        $datos = "?, ?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $data);
        return $insert;
    }
    public function getProductosPedido(Int $id_pedido){
        $atributos="productos_pedidos.*, productos.id_producto, productos.nombre, productos.imagen";
        $addquery=" JOIN productos ON productos.id_producto = productos_pedidos.producto WHERE pedido=$id_pedido";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function borrar(Int $pedido, Int $producto){
        $addquery=" WHERE pedido=$pedido AND producto=$producto";
        $consulta=$this->pd->update($this->tabla, $addquery);
        return $consulta;
    }
}