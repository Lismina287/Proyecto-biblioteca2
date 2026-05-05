<?php


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1>Inicia de Sesión</h1>
        <form action="comprobar_login.php" method="POST">
            <input type="text" name="usuario" required>
            <input type="password" name="contraseña" required>
            <input type="submit" value="Iniciar sesión">
            
        </form>
        <!-- mensaje de error -->
         
    </body>
</html>  