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
    <h2>Crear Cliente</h2>
    <form action="guardar_cliente.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required><br>
        <input type="date" name="fecha" required><br>
        <input type="text" name="localidad" placeholder="Localidad" required><br>
        <input type="submit" value="Guardar cliente">
    </form>

    <a href="clientes.php">Volver</a>

</body>

</html>
