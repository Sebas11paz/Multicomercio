<?php
require_once "../Models/DB.php";
require_once "../Models/Conexion.php";
require_once "../Models/Usuarios.php";
$usuario = new UsuariosModel();
print("Ingrese un nombre de usuario, y debe ser sin espacios\n");
$nombre_usuario= readline("Usuario:");
$password = readline("Contraseña:");
$contrasenia=hash("sha256", $password);
$rol ="propietario";
$dni = readline("Cédula:");
$data = [$nombre_usuario, $contrasenia, $rol, $dni];
$respuesta = $usuario->guardar($data);
if($respuesta){
    print("Usuario creado con exito");
}else{print("Error al crear el usuario");}
