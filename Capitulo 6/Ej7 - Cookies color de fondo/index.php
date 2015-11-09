<?php 



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
                
                background-color: <?=$_COOKIE["color"]?>;
                
            }
            
        </style>
        
    </head>
    <body>
        <form action="index.php" mehtod="post">
            <input type="color" name="color"><br>
            <input type="submit" name="submit" value="Cambiar">
        </form>
        
        <?php
        
        print_r($_COOKIE);
        
        // Si enviamos el formulario
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            setcookie("color", $color, time() + (24*60*60));
            $_SESSION["color"] = $color;
        }
        ?>
    </body>
</html>
