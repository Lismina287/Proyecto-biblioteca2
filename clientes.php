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

?>
<html>
    <body>
        <h2>Listado de Clientes</h2>
        <!-- <p>Usuario: <?php echo $_SESSION["usuario"];?></p> -->

        <a href="logout.php">Cerrar sesión</a><br>
        <a href="crear_cliente.php">Crear nuevo cliente</a><br>

        <ul>
            <?php foreach ($clientes as $cliente): ?>
                <li>
                    <?php echo $cliente->NOMBRE . " " . $cliente->APELLIDOS; ?>
                    <!-- (<?php echo $cliente->LOCALIDAD; ?>) -->

                    <a href="editar_cliente.php?id=<?php echo $cliente->ID; ?>">Editar | </a>
                    <a href="borrar_cliente.php?id=>?php echo $cliente->ID; ?>">Borrar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

