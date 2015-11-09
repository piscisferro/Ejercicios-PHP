<?php
    // Si enviamos el formulario
    if (isset($_REQUEST["fondo"])) {
        // Recogemos fondo del formulario
        $color = $_REQUEST["fondo"];
        // Creamos la cookie y le damos el valor de color
        setcookie("fondo", $color, time() + 3*24*3600);
        // Refrescamo la pagina para que se aplique el fondo.
        header("Location: index.php");
    }
    
?>

<!DOCTYPE html>
<!--
Ejercicio 7
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de
una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cookies color fondo</title>
        <style>
            
            body {
                background-color: <?=$_COOKIE["fondo"]?>;
            }
            
        </style>
        
    </head>
    <body>
        <form action="index.php" mehtod="post">
            <input type="color" name="fondo"><br>
            <input type="submit" name="submit" value="Cambiar">
        </form>
    </body>
</html>
