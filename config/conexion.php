<?php

$servidor = "bbdd";
$usuario = "root";
$contraseña = "root";
$nombre_bbdd = "proyecto_biblioteca2";
$borrar = "esto se borra";

$conexion = new mysqli($servidor, $usuario, $contraseña, $nombre_bbdd);

if ($conexion->connect_error) {
    echo "Error en la conexión. <br>" . $conexion->connect_error;
}  

// comentario de prueba
