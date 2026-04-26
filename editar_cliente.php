<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";
require "clases/cliente.php";

$id = $_GET["id"];

$consulta = "SELECT * FROM clientes WHERE ID = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->bind_param("i", $id);
$sentencia->execute();

$cliente = $sentencia->get_result()->fetch_assoc();

?>

<html>
    <body>
        <h2>Editar Cliente</h2>
        <form action="actualizar_cliente.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente["ID"];?>">
            <input type="text" name="nombre" value="<?php echo $cliente["NOMBRE"];?>" required><br>
            <input type="text" name="apellidos" value="<?php echo $cliente["APELLIDOS"]; ?>" required><br>
            <input type="date" name="fecha" value="<?php echo $cliente["FECHA_NACIMIENTO"]; ?>" required><br>
            <input type="text" name="localidad" value="<?php echo $cliente["LOCALIDAD"]; ?>" required><br>
            <input type="submit" value="Actualizar cliente">
        </form>

        <a href="clientes.php">Volver</a>

    </body>
</html>