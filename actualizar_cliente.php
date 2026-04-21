<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$fecha = $_POST["fecha"];
$localidad = $_POST["localidad"];

$consulta = "UPDATE clientes
             SET NOMBRE = ?, APELLIDOS = ?, FECHA_NACIMIENTO = ?, LOCALIDAD = ?
             WHERE ID = ?";

$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("ssssi", $nombre, $apellidos, $fecha, $localidad, $id);
$sentencia->execute();

header("Location: clientes.php");
exit;