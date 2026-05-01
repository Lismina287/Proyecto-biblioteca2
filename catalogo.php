<?php
session_start();

if (!isset($_SESSION["usuario"])); {
    header("Location: login.php");
    exit;
}

require "config/conexion.php";
require "clases/libro.php";
require "clases/pelicula.php";

$titulo = $_GET["titulo"] ?? "";
$genero = $_GET["genero"] ?? "";
$autor = $_GET["autor"] ?? "";
$ano = $_GET["ano"] ?? "";
$precio = $_GET["precio"] ?? "";

$consulta_libros = "SELECT libros.*, autores.NOMBRE AS NOMBRE_AUTOR
FROM libros 
JOIN autores ON libros.AUTOR_ID = autores.ID
WHERE libros.TITULO LIKE ?
AND libros.GENERO LIKE ?
AND autores.NOMBRE LIKE ?
AND YEAR(libros.AÑO) LIKE ?
AND libros.PRECIO LIKE ?";

$sentencia_libros = $conexion->prepare($consulta_libros);
$sentencia_libros->bind_param("ssss", $titulo, $genero, $autor, $ano, $precio);
$sentencia_libros->execute();
$resultado_libros = $sentencia_libros->get_result();

$consulta_peliculas = "SELECT * FROM peliculas
WHERE TITULO LIKE ?
AND GENERO LIKE ?
AND DIRECTOR LIKE ?
AND YEAR(AÑO_ESTRENO) LIKE ?";

$sentencia_peliculas = $conexion->prepare($consulta_peliculas);
$sentencia_peliculas->bind_param("ssss", $titulo, $genero, $autor, $ano);
$sentencia_peliculas->execute();
$resultado_peliculas = $sentencia_peliculas->get_result();
?>

<html>
    <body>
        <h1>Catálogo</h1>
        <form method="GET">
            <input type="text" name="titulo" placeholder="Título" value="<?php echo $titulo; ?>">
            <input type="text" name="genero" placeholder="Género" value="<?php echo $genero; ?>">
            <input type="text" name="autor" placeholder="Autor / Director" value="<?php echo $autor; ?>">
            <input type="text" name="ano" placeholder="Año" value="<?php echo $ano; ?>">
            <input type="submit" value="Buscar">
        </form>

        <h2>Libros</h2>
        <ul>
            <?php while ($libro = $resultado_libros->fetch_object(Libro::class)): ?>
                <li>
                    <?php echo $libro->TITULO; ?> -
                    <?php echo $libro->GENERO; ?> -
                    <?php echo $libro->AÑO; ?> -
                    Disponible
                    <a href="reservas.php?tipo=libro&id=<php echo $libro->ID; ?>">Reservar</a>
                </li>
        </ul>
    </body>
</html>


