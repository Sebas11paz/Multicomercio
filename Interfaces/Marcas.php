<?php
class Marcas{
    private $modelo;
    function __construct()
    {
        $this->modelo = new MarcasModel();
    }
    function listar(){
        $datos = $this->modelo->listar();
        return $datos;
    }
    function getMarca($id){
        $datos = $this->modelo->getMarca($id);
        return $datos;
    }

    function setData(){
        $nombre=$_POST["nombre"];
        $dirurl=$_POST["dirurl"];
        $data=[$nombre, $dirurl];
        return $data;
    }
    
    function guardar(){
        $data=$this->setData();
        $imagen=$this->caragarImagen($data[0]);
        $data[2]=$imagen;
        $respuesta = $this->modelo->guardar($data);
        $mensaje = $respuesta==1? Mensajes::msOK("Registro de maraca") : Mensajes::msError("registrar maraca");
        return $mensaje;
    }
    function actualizar($id){
        $data=$this->setData();
        $respuesta = $this->modelo->actualizar($data, $id);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de maraca") : Mensajes::msError("actualizar maraca");
        return $mensaje;
    }
    function eliminar($id){
        $marca = $this->getMarca($id);
        $marca = $marca[0];
        $respuesta = $this->modelo->borrar($id);
        $mensaje = $respuesta==1? Mensajes::msOK("Eliminación de marca") : Mensajes::msError("eliminación marca:".$respuesta);
        if($respuesta==1){
            if(file_exists("./img/img_marcas/".$marca["nombre"].".png")){
                unlink("./img/img_marcas/".$marca["nombre"].".png");
            }
        }
        return $mensaje;
    }
    function  caragarImagen($nombre){
        $error= $_FILES["imagen"]["error"];
        if ($error == UPLOAD_ERR_OK) {
            $nombre_tmp = $_FILES["imagen"]["tmp_name"];
            //$nombre = basename($_FILES["imagen"]["name"]);
            move_uploaded_file($nombre_tmp, "img/img_marcas/$nombre.png");
            $path="img/img_marcas/";
            $imagen=$path.$nombre.".png";
            return $imagen;
        }
    }
}