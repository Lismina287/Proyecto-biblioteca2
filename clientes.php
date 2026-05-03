<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";
require "clases/cliente.php";

$resultado = $conexion->query("SELECT * FROM clientes");

$clientes = [];

while(true){
    $cliente = $resultado->fetch_object(Cliente::class);

    if($cliente == null){
        break;
    }
    $clientes[] = $cliente;
}

?>
<!DOCTYPE html>
<html lang="es">
    <body>
        <h2>Listado de Clientes</h2>
        <!-- <p>Usuario: <?php echo $_SESSION["usuario"];?></p> -->

        <a href="logout.php">Cerrar sesión</a><br>
        <a href="crear_cliente.php">Crear nuevo cliente</a><br>
        <a href="bienvenido.php">Volver</a><br>

        <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha nacimiento</th>
            <th>Localidad</th>
            <th></th>
        </tr>
        <?php foreach($clientes as $c): ?>
            <tr>
                <td><?= $c->ID ?></td>
                <td><?= $c->NOMBRE ?></td>
                <td><?= $c->APELLIDOS ?></td>
                <td><?= $c->FECHA_NACIMIENTO ?></td>
                <td><?= $c->LOCALIDAD ?></td>
                <td>
                    <a href="editar_cliente.php?id=<?= $c->ID ?>">Editar | </a>
                    <a href="borrar_cliente.php?id=<?= $c->ID ?>">Borrar</a> |
                    <a href="reserva_cliente.php?id=<?= $c->ID ?>">Reservar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </body>
</html>

