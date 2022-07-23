<?php
require_once "models.php";
require_once "SessionController.php";
class UserController
{
    public $model;
    private $usuarios;
    private $respuesta;
    private $usuario;
    private $password;
    //public $messaje;
    function __construct()
    {
        $this->model = new UsuariosModel();
        //$this->messaje= new MessageController();
        $this->usuario=$_POST["usuario"];
        $this->password=$_POST["password"];
    }

    function recivirDatos()
    {
        $this->respuesta=$this->model->consultarUsuario($this->usuario);
        $estado=count($this->respuesta)>0? true:false;
        return $estado;
    }
    function validaUsuario($session){
        $estado=$this->recivirDatos();
        if ($estado==true) {
            if ($this->respuesta[0]["password"]==$this->password) {
               $session->idSession($this->respuesta[0]["usuario"]);
               $data["estado"]=1;
               echo json_encode($data);
            }
            else{
                $data["estado"]=0;
                $data["mensaje"]='clave incorrecta';
                echo json_encode($data);
            }
        }
        else{
            $data["estado"]=0;
            $data["mensaje"]='usuario incorecto';
            echo json_encode($data);
        }
    }
}
$user= new UserController();
$user->validaUsuario($session);