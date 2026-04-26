<?php

session_start();

//require
require "config/conexion.php";
require "clases/usuario.php";

// $_SESSION["usuario"] = $usuario->USUARIO;

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];




$consulta = "SELECT * FROM usuarios WHERE USUARIO = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("s", $usuario);
$sentencia->execute();

//get_result - recuperar los usuarios
//store_result - cuenta el número de datos

$resultado = $sentencia->get_result();
$usuarioObj = $resultado->fetch_object(Usuario::class);

//encriptar contraseña
  if ($usuarioObj != null && hash("sha256", $contraseña) == $usuarioObj->CONTRASENA) {
    $_SESSION["usuario"] = $usuarioObj->USUARIO;
    header("Location: catalogo.php");
    exit;
} else {
    //crear mensaje de error
    header("Location: login.php");
    exit;
}  
