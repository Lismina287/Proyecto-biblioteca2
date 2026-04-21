<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$fecha = $_POST["fecha"];
$localidad = $_POST["localidad"];

$consulta = "INSERT INTO clientes (NOMBRE, APELLIDOS, FECHA_NACIMIENTO, LOCALIDAD)
            VALUES (?, ?, ?, ?)";

$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("ssss", $nombre, $apellidos, $fecha, $localidad);
$sentencia->execute();

header("Location: clientes.php");
exit;


?>