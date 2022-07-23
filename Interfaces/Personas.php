<?php

require_once "./Models/Usuarios.php";

class Personas{
    private $modelo;
    function __construct()
    {
        $this->modelo = new PersonasModel();
        $this->usuarios = new UsuariosModel();
    }
    function listar(){
        $datos = $this->modelo->listar();
        return $datos;
    }
    function clientes(){
        $datos = $this->modelo->listarClientes();
        return $datos;
    }
    function getPersona($dni){
        $respuesta = $this->modelo->getPersona($dni);
        return $respuesta;
    }
    function getPerfil(){
        $dni = $_SESSION["dni"]; 
        $respuesta = $this->modelo->getPersona($dni);
        return $respuesta;
    }
    function getData(){
        $dni=$_POST["dni"];
        $apellidos=$_POST["apellidos"];
        $nombres=$_POST["nombres"];
        $email=$_POST["email"];
        $celular=$_POST["celular"];
        $direccion=$_POST["direccion"];
        $data=[$dni, $apellidos, $nombres, $email, $celular, $direccion];
        return $data;
    }
    function registrar(){
        $data=$this->getData();
        $existe = $this->getPersona($data[0]);
        if(count($existe)==0){
            $respuesta = $this->modelo->guardar($data);
            $mensaje = array('estado'=>"error",'ms'=>"Error al registrar, intente nuevamente");
            if($respuesta){
                $this->registrarUsuarioCliente();
                $mensaje = array('estado'=>"ok",'ms'=>"Cuenta creada exitosamente");
            }
        }else{
            $mensaje = array('estado'=>"error",'ms'=>"Ya existe, una cuenta con este numero de cédula");
        }
        return $mensaje;
    }
    function registrarUsuarioCliente(){
        $email=$_POST["email"];
        $contrasenia=hash("sha256", $_POST["password"]);
        $rol ="cliente";
        $persona=$_POST["dni"];
        $data = [$email, $contrasenia, $rol, $persona];
        $this->usuarios->guardar($data);
    }
    function actualizar(){
        $dni = $_SESSION["dni"];
        $data=$this->getData();
        $existe = $this->getPersona($dni);
        if($_SESSION["dni"] == $_POST["dni"]){
            $respuesta = $this->modelo->actualizar($data, $dni);
            if($respuesta){
                if($_SESSION["usuario"] != $_POST["email"]){
                    $_SESSION["usuario"]=$_POST["email"];
                    $remail=$this->usuarios->actualizar($_POST["email"], $_SESSION["dni"]);
                    $mensaje = array('estado'=>"ok",'ms'=>"Datos actualizados exitosamente y usuario modificado");
                }else{
                    $mensaje = array('estado'=>"ok",'ms'=>"Datos actualizados exitosamente");
                }
            }else{
                $mensaje = array('estado'=>"error",'ms'=>"Error al actualizar, intente nuevamente");
            }
        }elseif(count($existe)>0){
            $mensaje = array('estado'=>"error",'ms'=>"Ya existe una cuenta con este numero de cédula");
        }else{
            $respuesta = $this->modelo->actualizar($data, $dni);
            if($respuesta){
                $_SESSION["dni"]=$_POST["dni"];
                if($_SESSION["usuario"] != $_POST["email"]){
                    $_SESSION["usuario"]=$_POST["email"];
                    $remail = $this->usuarios->actualizar($_POST["email"], $_SESSION["dni"]);
                    $mensaje = array('estado'=>"ok",'ms'=>"Datos actualizados exitosamente y usuario modificado,");
                }else{
                    $mensaje = array('estado'=>"ok",'ms'=>"Datos actualizados exitosamente");
                }
            }else{
                $mensaje = array('estado'=>"error",'ms'=>"Error al actualizar, intente nuevamente");
            }
        }
        return $mensaje;
    }
}
