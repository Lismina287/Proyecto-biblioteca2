<?php

$servidor = "bbdd";
$usuario = "root";
$contraseña = "root";
$nombre_bbdd = "proyecto-biblioteca";

$conexion = new mysqli($servidor, $usuario, $contraseña, $nombre_bbdd);
$conexion->set_charset("utf8mb4");

if ($conexion->connect_error) {
    echo "Error en la conexión. <br>" . $conexion->connect_error;
}  

// comentario de prueba
