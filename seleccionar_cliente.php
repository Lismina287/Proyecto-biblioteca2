<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";

$idLibro = $_GET["libro"] ?? null;
$idPelicula = $_GET["pelicula"] ?? null;

if (!$idLibro && !$idPelicula) {
    die("Error: No se ha seleccionado ningún artículo.");
}

if ($idLibro) {
    $stmt = $conexion->prepare("SELECT TITULO FROM libros WHERE ID = ?");
    $stmt->bind_param("i", $idLibro);
    $tipo = "Libro";
} else {
    $stmt = $conexion->prepare("SELECT TITULO FROM peliculas WHERE ID = ?");
    $stmt->bind_param("i", $idPelicula);
    $tipo = "Película";
}

$stmt->execute();
$resultado = $stmt->get_result();
$articulo = $resultado->fetch_object();

if (!$articulo) {
    die("Error: El artículo seleccionado no existe.");
}

$clientes = [];
$resultadoClientes = $conexion->query("SELECT * FROM clientes");
if ($resultadoClientes) {
    while ($cliente = $resultadoClientes->fetch_object()) {
        $clientes[] = $cliente;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="estilos.css">
    </head>
<body>
    <h2>Seleccionar Cliente para Reservar</h2>
    
    <p>Artículo: <?= $articulo->TITULO ?> (<?= $tipo ?>)</p>
    
    <a href="catalogo.php">Volver al catálogo</a>
    
    <h3>Clientes</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Localidad</th>
            <th></th>
        </tr>
        
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente->ID ?></td>
                <td><?= $cliente->NOMBRE ?></td>
                <td><?= $cliente->APELLIDOS ?></td>
                <td><?= $cliente->LOCALIDAD ?></td>
                <td>
                    <a href="reservas.php?accion=reservar&cliente=<?= $cliente->ID ?>&<?= $idLibro ? "libro=$idLibro" : "pelicula=$idPelicula" ?>">Seleccionar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>