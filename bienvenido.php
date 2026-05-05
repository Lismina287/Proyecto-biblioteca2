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

        
            <a href="catalogo.php">Catálogo</a>
            <a href="reservas.php">Reservas</a>
            <a href="clientes.php">Clientes</a>
            <a href="logout.php">Cerrar sesión</a>
        
    </body>
</html>
