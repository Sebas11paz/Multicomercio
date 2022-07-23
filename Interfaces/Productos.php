<?php
class Productos{
    private $modelo;
    function __construct()
    {
        $this->modelo = new ProductosModel();
    }
    function getTodos(){
        $datos = $this->modelo->getProductos();
        return $datos;
    }
    function getProductos($busqueda){
        $datos = $this->modelo->getProductos();
        return $datos;
    }
    function getProductosCategoria($busqueda){
        $datos = $this->modelo->getProductosCategoria($busqueda);
        return $datos;
    }
    function getProductosByCatalogo($tipo){
        $datos = $this->modelo->catalogoProductos($tipo);
        return $datos;
    }
    function getProducto($param){
        $respuesta = $this->modelo->getProductoJoinCategoria($param);
        return $respuesta;
    }
    function setData(){
        $id_categoria=$_POST["categoria"];
        $nombre=$_POST["nombre"];
        $marca=$_POST["marca"];
        $stock=$_POST["stock"];
        $precio=$_POST["precio"];
        $medida=$_POST["medida"];
        $descripcion=$_POST["descripcion"];
        $descuento=$_POST["descuento"];
        $motivo_descuento=$_POST["motivo_descuento"];
        $data=[$id_categoria, $nombre, $marca, $stock, $precio, $medida, $descripcion, $descuento, $motivo_descuento];
        return $data;
    }
    function guardar(){
        $data=$this->setData();
        $imagen=$this->caragarImagen();
        $data[9]=$imagen;
        $respuesta = $this->modelo->guardar($data);
        $mensaje = $respuesta==1? Mensajes::msOK("Registro de producto") : Mensajes::msError("registrar producto:");
        return $mensaje;
    }
    function actualizar($id){
        $data=$this->setData();
        $respuesta = $this->modelo->actualizar($data, $id);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de producto") : Mensajes::msError("actualizar producto");
        return $mensaje;
    }
    function actualizarImg($id){
        $imagen_ant=isset($_POST["img_ant"])?$_POST["img_ant"]:"";
        if(file_exists("./".$imagen_ant)){
            unlink("./".$imagen_ant);
        }
        $imagen=$this->caragarImagen();
        $respuesta = $this->modelo->actualizarImagen($id, $imagen);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de imagen") : Mensajes::msError("actualizar imagen");
        return $mensaje;
    }
    function  caragarImagen(){
        $error= $_FILES["imagen"]["error"];
        if ($error == UPLOAD_ERR_OK) {
            $nombre_tmp = $_FILES["imagen"]["tmp_name"];
            $nombre = basename($_FILES["imagen"]["name"]);
            move_uploaded_file($nombre_tmp, "img/img_productos/$nombre");
            $path="img/img_productos/";
            $imagen=$path.$nombre;
            return $imagen;
        }
    }
}
