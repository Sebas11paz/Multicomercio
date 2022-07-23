<?php
class Categorias{
    private $modelo;
    function __construct()
    {
        $this->modelo = new CategoriasModel();
    }
    function getTodos(){
        $datos = $this->modelo->listar();
        return $datos;
    }
    function getCategoria($param){
        $respuesta = $this->modelo->getCategoria($param);
        return $respuesta;
    }
    function guardar($nombre){
        $id_catalogo=$_POST["catalogo"];
        $nombre=$_POST["nombre"];
        $imagen=$this->caragarImagen($nombre);
        $data=[$id_catalogo, $nombre, $imagen];
        $respuesta = $this->modelo->guardar($data);
        $mensaje = $respuesta==1? Mensajes::msOK("Registro de categoria") : Mensajes::msError("registrar categoria");
        return $mensaje;
    }
    function actualizar($id){
        $nombre=$_POST["nombre"];
        $respuesta = $this->modelo->actualizar($nombre, $id);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de categoria") : Mensajes::msError("actualizar categoria");
        return $mensaje;
    }
    function getCategorias($tipo){
        $respuesta = $this->modelo->categoriasCatalogo($tipo);
        return $respuesta;
    }
    function actualizarImg($id){
        $imagen_ant=isset($_POST["img_ant"])?$_POST["img_ant"]:"";
        if(file_exists("./".$imagen_ant)){
            unlink("./".$imagen_ant);
        }
        $imagen=$this->caragarImagen($id);
        $respuesta = $this->modelo->actualizarImagen($id, $imagen);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de imagen") : Mensajes::msError("actualizar imagen-".$respuesta);
        return $mensaje;
    }
    function  caragarImagen($id){
        $error= $_FILES["imagen"]["error"];
        if ($error == UPLOAD_ERR_OK) {
            $nombre_tmp = $_FILES["imagen"]["tmp_name"];
            //$nombre = basename($_FILES["imagen"]["name"]);
            move_uploaded_file($nombre_tmp, "img/img_categorias/$id.png");
            $path="img/img_categorias/";
            $imagen=$path.$id.".png";
            return $imagen;
        }
    }
}
