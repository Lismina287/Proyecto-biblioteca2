<?php 
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
    <body>
        <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1>

        <ul>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="reservas.php">Reservas</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </body>
</html>
