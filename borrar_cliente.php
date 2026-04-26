<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM clientes WHERE ID = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("i", $id);
$sentencia->execute();

header("Location: clientes.php");
exit;
