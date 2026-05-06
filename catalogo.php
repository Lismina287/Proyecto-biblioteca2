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

$consulta_libros = "SELECT libros.*, autores.NOMBRE AS AUTOR
                    FROM libros
                    LEFT JOIN autores ON libros.AUTOR_ID = autores.ID";
$consulta_pelis = "SELECT * FROM peliculas";

if ($filtro && $valor) {
    if ($filtro == "YEAR") {
        $consulta_libros .= " WHERE YEAR LIKE '%$valor%'";
        $consulta_pelis .= " WHERE ANIO_ESTRENO LIKE '%$valor%'";
    } elseif ($filtro == "AUTOR_ID") {
        $consulta_libros .= " WHERE autores.NOMBRE LIKE '%$valor%'";
        $consulta_pelis .= " WHERE DIRECTOR LIKE '%$valor%'";
    } else {
        $consulta_libros .= " WHERE $filtro LIKE '%$valor%'";
        $consulta_pelis .= " WHERE $filtro LIKE '%$valor%'";
    }
}

$libros = $conexion->query($consulta_libros);
$pelis = $conexion->query($consulta_pelis);

$reservados_libros = [];
$reservados_pelis = [];

$result_reservas = $conexion->query("SELECT ID_LIBRO, ID_PELICULA FROM reservas");
while ($row = $result_reservas->fetch_assoc()) {
    if ($row['ID_LIBRO']) $reservados_libros[] = $row['ID_LIBRO'];
    if ($row['ID_PELICULA']) $reservados_pelis[] = $row['ID_PELICULA'];
}

function reservado($idLibro = null, $idPelicula = null) {
    global $reservados_libros, $reservados_pelis;
    if ($idLibro !== null) {
        return in_array($idLibro, $reservados_libros);
    }
    if ($idPelicula !== null) {
        return in_array($idPelicula, $reservados_pelis);
    }
    return false;
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Catálogo</h2>

    <form method="GET">
        <select name="filtro">
            <option value="TITULO">Título</option>
            <option value="GENERO">Género</option>
            <option value="AUTOR_ID">Autor/Director</option>
            <option value="YEAR">Año</option>
        </select>
        <input type="text" name="valor" placeholder="Buscar">
        <input type="submit" value="Filtrar">
    </form>

    <a href="bienvenido.php">Volver</a>

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
            <td><?= $l->AUTOR ?></td>
            <td><?= $l->YEAR ?></td>

            <td>
                <?php if (reservado($l->ID, null)): ?>
                    <strong>No disponible</strong>
                <?php else: ?>
                    Disponible
                <?php endif; ?>
            </td>

            <td>
                <?php if (!reservado($l->ID, null)): ?>
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
                    <?php if (reservado(null, $p->ID)): ?>
                        <strong>No disponible</strong>
                    <?php else: ?>
                        Disponible
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!reservado(null, $p->ID)): ?>
                        <a href="seleccionar_cliente.php?pelicula=<?= $p->ID ?>">Reservar</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
    </table>

</body>

</html>