<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["accion"])) {
    $accion = $_GET["accion"];
    
    if ($accion === "reservar") {
        $idCliente = $_GET["cliente"] ?? null;
        $idLibro = $_GET["libro"] ?? null;
        $idPelicula = $_GET["pelicula"] ?? null;
        
        if ($idCliente && ($idLibro || $idPelicula)) {
            if ($idLibro) {
                $check = $conexion->prepare("SELECT COUNT(*) as total FROM reservas WHERE ID_LIBRO = ?");
                $check->bind_param("i", $idLibro);
            } else {
                $check = $conexion->prepare("SELECT COUNT(*) as total FROM reservas WHERE ID_PELICULA = ?");
                $check->bind_param("i", $idPelicula);
            }
            $check->execute();
            $resultCheck = $check->get_result();
            $row = $resultCheck->fetch_assoc();
            
            if ($row['total'] == 0) {
                $insert = $conexion->prepare("INSERT INTO reservas (ID_CLIENTE, ID_LIBRO, ID_PELICULA, FECHA_RESERVA) VALUES (?, ?, ?, CURDATE())");
                $insert->bind_param("iii", $idCliente, $idLibro, $idPelicula);
                $insert->execute();
                $mensaje = "Reserva realizada con éxito.";
            } else {
                $mensaje = "Este artículo ya está reservado.";
            }
        }
    }
    
    elseif ($accion === "devolver") {
        $idReserva = $_GET["id"] ?? null;
        
        if ($idReserva) {
            $delete = $conexion->prepare("DELETE FROM reservas WHERE ID = ?");
            $delete->bind_param("i", $idReserva);
            $delete->execute();
            $mensaje = "Devolución realizada. El artículo ya está disponible.";
        }
    }
}

$consulta = "
    SELECT 
        r.ID AS RESERVA_ID,
        r.FECHA_RESERVA,
        c.NOMBRE,
        c.APELLIDOS,
        CASE 
            WHEN r.ID_LIBRO IS NOT NULL THEN 'Libro'
            WHEN r.ID_PELICULA IS NOT NULL THEN 'Película'
        END AS TIPO,
        CASE 
            WHEN r.ID_LIBRO IS NOT NULL THEN l.TITULO
            WHEN r.ID_PELICULA IS NOT NULL THEN p.TITULO
        END AS TITULO_ARTICULO
    FROM reservas r
    JOIN clientes c ON r.ID_CLIENTE = c.ID
    LEFT JOIN libros l ON r.ID_LIBRO = l.ID
    LEFT JOIN peliculas p ON r.ID_PELICULA = p.ID
    ORDER BY r.FECHA_RESERVA DESC
";

$resultado = $conexion->query($consulta);
$reservas = [];
if ($resultado) {
    while ($reserva = $resultado->fetch_object()) {
        $reservas[] = $reserva;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="estilos.css">
    </head>
<body>
    <h2>Reservas</h2>
    
    <?php if ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
    
    <a href="catalogo.php">Catálogo</a>
    <a href="bienvenido.php">Volver</a>
    
    <h3>Reservas activas</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Reserva</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Artículo</th>
            <th>Fecha Reserva</th>
            <th></th>
        </tr>
        
        <?php foreach($reservas as $r): ?>
            <tr>
                <td><?= $r->RESERVA_ID ?></td>
                <td><?= $r->NOMBRE . ' ' . $r->APELLIDOS ?></td>
                <td><?= $r->TIPO ?></td>
                <td><?= $r->TITULO_ARTICULO ?></td>
                <td><?= $r->FECHA_RESERVA ?></td>
                <td>
                    <a href="reservas.php?accion=devolver&id=<?= $r->RESERVA_ID ?>">Devolver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>