<?php
require_once "./Controllers/SessionController.php";
class Usuarios{
    private $session;
    function __construct()
    {
        $this->session = new SessionController();
        $this->modelo = new UsuariosModel();
    }
    function acceder(){
        $usuario= $_POST["usuario"];
        $password= hash("sha256", $_POST["password"]);
        $respueta = $this->session->iniciar($usuario, $password);
        return $respueta;
    }
    function actualizarPassword(){
        $dni = $_SESSION["dni"];
        $password= hash("sha256", $_POST["password"]);
        $respuesta = $this->modelo->actualizarPassword($dni, $password);
        $mensaje = $respuesta==1? Mensajes::msOK("Actualización de contraseña") : Mensajes::msError("actualizar contraseña");
        return $mensaje;
    }
    function salir(){
        $respueta = $this->session->salir();
    }
    
}
