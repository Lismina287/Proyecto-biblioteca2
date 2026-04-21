<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";
require "clases/clientes.php";

$resultado = $conexion->query("SELECT * FROM clientes");

$clientes = [];

while(true){
    $cliente = $resultado->fetch_object(Cliente::class);

    if($cliente == null){
        break;
    }
    $clientes[] = $cliente;
}


