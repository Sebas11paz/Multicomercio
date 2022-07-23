<?php
class Mensajes{
    public static function msError($ms){

        $mensaje="Error al $ms, verifique los datos e intente nuevamente";
        $estado="error";
        return array('ms'=>$mensaje, 'estado'=>$estado);

    }
    public static function msOK($ms){

        $mensaje="$ms realizado con exito";
        $estado="ok";
        return array('ms'=>$mensaje, 'estado'=>$estado);
        
    }
}