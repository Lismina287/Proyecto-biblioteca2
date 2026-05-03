<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";
require "clases/libro.php";
require "clases/pelicula.php";

$filtro = $_GET["filtro"] ?? "";
$valor = $_GET["valor"] ?? "";

$consulta_libros = "SELECT * FROM libros";
$consulta_pelis = "SELECT * FROM peliculas";

if ($filtro && $valor) {
    $consulta_libros .= " WHERE $filtro LIKE '%$valor%'";
    $consulta_pelis .= " WHERE $filtro LIKE '%$valor%'";
}

$libros = $conexion->query($consulta_libros);
$pelis = $conexion->query($consulta_pelis);

function reservado($conexion, $idLibro = null, $idPelicula = null) {
    if ($idLibro !== null) {
        $consulta = "SELECT * FROM reservas WHERE ID_LIBRO = ?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->bind_param("i", $idLibro);
    } elseif ($idPelicula !== null) {
        $consulta = "SELECT * FROM reservas WHERE ID_PELICULA = ?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->bind_param("i", $idPelicula);
    } else {
        return false;
    }

    $sentencia->execute();
    $res = $sentencia->get_result();
    return $res->num_rows > 0;
}

?>

<!DOCTYPE html>
<html>

<body>
    <h2>Catálogo</h2>

    <form method="GET">
        <select name="filtro">
            <option value="TITULO">Título</option>
            <option value="GENERO">Género</option>
            <option value="AUTOR_ID">Autor (ID)</option>
            <option value="AÑO">Año</option>
        </select>
        <input type="text" name="valor" placeholder="Buscar">
        <input type="submit" value="Filtrar">
    </form>

    <a href="info.php">Volver</a>
    
    <h3>Libros</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Género</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Disponibilidad</th>
            <th></th>
        </tr>
        
        <?php while($l = $libros->fetch_object(Libro::class)): ?>
        <tr>
            <td><?= $l->ID ?></td>
            <td><?= $l->TITULO ?></td>
            <td><?= $l->GENERO ?></td>
            <td><?= $l->AUTOR_ID ?></td>
            <td><?= $l->YEAR ?></td>

            <td>
                <?php if (reservado($conexion, $l->ID, null)): ?>
                    <strong>No disponible</strong>
                <?php else: ?>
                    Disponible
                <?php endif; ?>
            </td>

            <td>
                <?php if (!reservado($conexion, $l->ID, null)): ?>
                    <a href="seleccionar_cliente.php?libro=<?= $l->ID ?>">Reservar</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
   

    <h3>Películas</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Año estreno</th>
            <th>Director</th>
            <th>Género</th>
            <th>Disponibilidad</th>
            <th></th>
        </tr>
        <?php while($p = $pelis->fetch_object(Pelicula::class)): ?>
            <tr>
                <td><?= $p->ID ?></td>
                <td><?= $p->TITULO ?></td>
                <td><?= $p->ANIO_ESTRENO ?></td>
                <td><?= $p->DIRECTOR ?></td>
                <td><?= $p->GENERO ?></td>
                <td>
                    <?php if (reservado($conexion, null, $p->ID)): ?>
                        <strong>No disponible</strong>
                    <?php else: ?>
                        Disponible
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!reservado($conexion, null, $p->ID)): ?>
                        <a href="seleccionar_cliente.php?pelicula=<?= $p->ID ?>">Reservar</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
    </table>

</body>

</html>