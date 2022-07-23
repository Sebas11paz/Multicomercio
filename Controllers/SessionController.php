<?php
class SessionController
{
	
	function idSession($usuario){
		$_SESSION["usuario"]=$usuario;
	}
	function iniciar($usuario, $password){
		$model= new UsuariosModel();
		$setUsuario= $model->consultarUsuario($usuario);
		if(count($setUsuario)==1){
			$iusuario= $setUsuario[0];
			if($password==$iusuario["contrasenia"]){
				$_SESSION["usuario"]=$iusuario["usuario"];
				$_SESSION["rol"]=$iusuario["rol"];
				$_SESSION["dni"]=$iusuario["id_persona"];
				if($_SESSION["rol"]=="propietario"){
					return array('estado'=>true, "redir"=>"/gestion/marcas");
				}else{
					return array('estado'=>true, "redir"=>"/inicio");
				}
			}else{
				return array('estado'=>"error",'ms'=>"Contraseña incorrecta, verifique sus datos e intente nuevamente");
			}
		}else{
			return array('estado'=>"error",'ms'=>"Credenciales incorrectas, verifique sus datos e intente nuevamente");
		}
	}
	static public function verifica(){
		if (isset($_SESSION["usuario"])) {
			return true;
		}
		else{
			return false;
		}
	}
	function salir(){
		session_destroy();
	}
}
?>