<?php

require_once "./Models/ProductosPedidos.php";
require_once "./Models/Productos.php";

class Pedidos{
    private $modelo;
    function __construct()
    {
        $this->modelo = new PedidosModel();
        $this->producto_pedidos = new ProductosPedidosModel();
        $this->productos = new ProductosModel();
    }
    function getTodos(){
        $datos = $this->modelo->listar();
        return $datos;
    }
    function getPedido($id){
        $datos = $this->modelo->getPedido($id);
        return $datos;
    }
    function getProductosPedido($id){
        $datos = $this->producto_pedidos->getProductosPedido($id);
        return $datos;
    }
    function getPedidosSinClientes(){
        $datos = $this->modelo->getPedidosSinClientes();
        return $datos;
    }
    function getPedidosPendientes(){
        $datos = $this->modelo->getPedidosPendientes();
        return $datos;
    }
    function getPedidosDespachados(){
        $datos = $this->modelo->getPedidosDespachados();
        return $datos;
    }
    function getPedidos(){
        $dni = $_SESSION["dni"];
        $respuesta = $this->modelo->getPedidosCliente($dni);
        return $respuesta;
    }
    function guardar(){
        date_default_timezone_set('America/Guayaquil');

        $json = $_POST["data"];
        $data = json_decode($json, true);
        $costo=$data["costo"];
        $productos = $data["productos"];
        $cliente = $_SESSION["dni"];
        $fecha = date('Y-n-j');
        $estado = "pendiente";
        $datos = [$cliente,$fecha, $costo, $estado];
        $respuesta=$this->modelo->guardar($datos);
        if($respuesta){
            $id_pedido=$this->modelo->getId();
            $this->registrarProducto($productos, $id_pedido["id"]);
            $mensaje = Mensajes::msOK("Registro de pedido");
            return $mensaje;
        }
        $mensaje = Mensajes::msError("registrar pedido");
        return $mensaje;
    }
    function pedidosinCliente(){
        date_default_timezone_set('America/Guayaquil');
        $json = $_POST["data"];
        $data = json_decode($json, true);
        $costo=$data["costo"];
        $productos = $data["productos"];
        $fecha = date('Y-n-j');
        $estado = "pendiente";
        $datos = [$fecha, $costo, $estado];
        $respuesta=$this->modelo->pedidoSinCliente($datos);
        if($respuesta){
            $id_pedido=$this->modelo->getId();
            $this->registrarProducto($productos, $id_pedido["id"]);
            $mensaje = Mensajes::msOK("Registro de nuevo pedido");
            return $mensaje;
        }
        $mensaje = Mensajes::msError("registrar pedido");
        return $mensaje;
    }
    function actualizar($id){
        $nombre=$_POST["nombre"];
        $respuesta = $this->modelo->actualizar($nombre, $id);
        return $respuesta;
    }
    function registrarProducto($productos, $id_pedido){
        foreach ($productos as $producto) {
            $productoAdd[0]= $id_pedido;
            $productoAdd[1]= $producto["id"];
            $productoAdd[2]= $producto["precio"];
            $productoAdd[3]= $producto["cantidad"];
            $this->producto_pedidos->addProducto($productoAdd);
            $this->actualizarStock($producto["id"], $producto["cantidad"]);
        }
    }
    function actualizarStock($id, $cantidad){
        $producto=$this->productos->getProducto($id);
        $stock = $producto[0]["stock"];
        $nuevo_stock = $stock-$cantidad;
        $respuesta = $this->productos->actualizarStock($id, $nuevo_stock);
        //$mensaje = $respuesta==1? Mensajes::msOK("Actualización de imagen") : Mensajes::msError("actualizar imagen");
        //return $mensaje;
    }
    function getProductos($id_pedido){
        $respuesta = $this->producto_pedidos->getProductosPedido($id_pedido);
        return $respuesta;
    }
    function despachar($id_pedido){
        $respuesta = $this->modelo->despacharPedido($id_pedido);
        $mensaje = $respuesta==1? Mensajes::msOK("Pedido despachado") : Mensajes::msError("despachar pedido");
        return $mensaje;
    }
    
}
