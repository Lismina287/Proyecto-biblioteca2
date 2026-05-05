<?php 
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1>
        <p>test</p>
        <ul>
            <li><a href="catalogo.php">Ver Catálogo</a></li>
            <li><a href="reservas.php">Ver reservas</a></li>
            <li><a href="clientes.php">Ver clientes</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </body>
</html>
