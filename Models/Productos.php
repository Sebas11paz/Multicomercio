<?php
class ProductosModel extends Conexion
{
    private $tabla;
    public function __construct()
    {
        parent::__construct();
        $this->tabla="productos";
    }
    public function guardar(array $producto)
    {
        $atributos = "(id_categoria, nombre, marca, stock, precio, medida, descripcion, descuento, motivo_descuento, imagen)";
        $datos = "?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
        $insert = $this->pd->create($atributos, $this->tabla, $datos, $producto);
        return $insert;
    }
    public function listar(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function getProducto(Int $id){
        $atributos="*";
        $addquery=" WHERE id_producto=$id";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function actualizar(array $productos,  Int $id){
        $datos = "id_categoria=$productos[0], nombre='$productos[1]', marca='$productos[2]', stock='$productos[3]',
         precio='$productos[4]', medida='$productos[5]', descripcion='$productos[6]', descuento=$productos[7], motivo_descuento='$productos[8]'";
        $addquery=" WHERE id_producto=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function actualizarImagen(Int $id, $imagen){
        $datos = "imagen='$imagen'";
        $addquery=" WHERE id_producto=$id";
        $consulta=$this->pd->update($addquery, $this->tabla, $datos);
        return $consulta;
    }
    public function getProductos(){
        $atributos="*";
        $addquery="";
        $respuesta=$this->pd->read($atributos, 'productos_categoria', $addquery);
        return $respuesta;
    }
    public function getProductosCategoria($busqueda){
        $atributos="*";
        $addquery=" WHERE categoria='$busqueda'";
        $respuesta=$this->pd->read($atributos, 'productos_categoria', $addquery);
        return $respuesta;
    }
    public function actualizarStock(Int $id, Int $stock){
        $datos = "stock=$stock";
        $addquery=" WHERE id_producto=$id";
        $respuesta=$this->pd->update($addquery, $this->tabla, $datos);
        return $respuesta;
    }
    public function getProductoJoinCategoria(Int $id){
        $atributos="*";
        $addquery=" WHERE id_producto=$id";
        $respuesta=$this->pd->read($atributos, 'productos_categoria', $addquery);
        return $respuesta;
    }
    public function catalogoProductos($tipo){
        $atributos="productos.*, catalogo_categoria.id_categoria, catalogo_categoria.catalogo, catalogo_categoria.id_catalogo, catalogo_categoria.nombre AS categoria";
        $addquery=" JOIN catalogo_categoria ON productos.id_categoria = catalogo_categoria.id_categoria WHERE catalogo_categoria.catalogo='$tipo' OR catalogo_categoria.nombre='$tipo'";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
    public function categoriaProductos($id_categoria){
        $atributos="productos.*, catalogo_categoria.id_categoria, catalogo_categoria.catalogo, catalogo_categoria.id_catalogo";
        $addquery=" JOIN catalogo_categoria ON productos.id_categoria = catalogo_categoria.id_categoria WHERE catalogo_categoria.id_categoria=$id_categoria";
        $respuesta=$this->pd->read($atributos, $this->tabla, $addquery);
        return $respuesta;
    }
}