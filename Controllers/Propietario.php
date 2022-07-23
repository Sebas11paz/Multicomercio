<?php
require_once("recursos.php");
class Propietario{
    public $usuario;
    function __construct()
    {
        if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="propietario"){
            $this->usuario = $_SESSION["usuario"];
        }else{
            header("location:/login");
        }
    }
    function marcas(){
        include_once("./Views/Propietario/marcas.php");
    }
    function catalogos(){
        include_once("./Views/Propietario/catalogos.php");
    }
    function categorias(){
        $modelo= new Catalogos();
        $catalogos=$modelo->getTodos();
        include_once("./Views/Propietario/categorias.php");
    }
    function productos(){
        $modelo= new Catalogos();
        $catalogos=$modelo->getTodos();
        include_once("./Views/Propietario/productos.php");
    }
    function pedidosPendientes(){
        include_once("./Views/Propietario/pedidos_pendientes.php");
    }
    function pedidosDespachados(){
        include_once("./Views/Propietario/pedidos_despachados.php");
    }
    function pedidosSinClientes(){
        include_once("./Views/Propietario/pedidos_sinclientes.php");
    }
    function pedidoImprimir($id){
        $id_pedido = $id;
        include_once("./Views/Propietario/nota_pedido.php");
    }
    function pedidoImprimir2($id){
        $id_pedido = $id;
        include_once("./Views/Propietario/nota_pedido_sincliente.php");
    }
    function clientes(){
        include_once("./Views/Propietario/clientes.php");
    }
    function catalogoProductos($busqueda){
        include_once("./Views/Propietario/productospedido.php");
    }
    function nuevoPedido(){
        include_once("./Views/Propietario/nuevospedidos.php");
    }
    function perfil(){
        include_once("./Views/Propietario/perfil.php");
    }
}