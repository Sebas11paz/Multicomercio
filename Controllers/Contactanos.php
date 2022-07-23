<?php
class Contactanos{
    public $myemail;
    function __construct()
    {
        $this->myemail="eishel3108@gmail.com";
    }
    function enviar(){
        $nombres = $_POST["nombres"];
        $remitente = $_POST["email"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"]." de  $nombres email: $remitente";
        $headers = "From: eishel3108@gmail.com";  
        $result = mail($this->myemail,$asunto,$mensaje,$headers);
        if($result){
            $respuesta["ms"]="Enviado con exito";
            $respuesta["estado"]="ok";
            return json_encode($respuesta);
        }else{
            $respuesta["ms"]="Ocurrio un error, intente más tarde";
            $respuesta["estado"]="error";
            return json_encode($respuesta);
        }
    }
    function contactenos(){
        require_once("./Views/Cliente/Contactanos.php");
    }
}