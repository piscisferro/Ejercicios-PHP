<?php
    // Si enviamos el formulario
    if (isset($_REQUEST["fondo"])) {
        // Recogemos fondo del formularioy  lo metemos en una variavle
        $color = $_REQUEST["fondo"];
        // Creamos la cookie y le damos el valor de color
        setcookie("fondo", $color, time() + 3*24*3600);
    } else { // Si no hemos mandado color por formulario
        // Asignamos a la variable de color el valor de la cookie
        $color = $_COOKIE["fondo"];
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
                /* Cogemos el color de la variable que se inicializa al principio */
                background-color: <?=$color?>;
            }
            
        </style>
        
    </head>
    <body>
        <form action="index.php" method="post">
            <input type="color" name="fondo"><br>
            <input type="submit" name="submit" value="Cambiar">
        </form>
    </body>
</html>
