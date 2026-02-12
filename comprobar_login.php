<?php
//require
require "config/conexion.php";
require "clases/usuario.php";

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$consulta = "SELECT * FROM usuarios WHERE USUARIO = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("s", $usuario);
$sentencia->execute();

//get_result - recuperar los usuarios
//store_result - cuenta el número de datos

$resultado = $sentencia->get_result();

$usuario = $resultado->fetch_object(Usuario::class);

//encriptar contraseña
if ($usuario != null && hash("sha256", $contraseña) == $usuario->CONTRASEÑA) {
    header("Location: reservas.php");
    exit;
} else {
    //crear mensaje de error
    header("Location: login.php");
    exit;
}  