<!DOCTYPE html>
<!--
Ejercicio 16
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 16</title>
    </head>
    <body>
        
        <form action="index.php" method="post">
            
            <input type="number" name="numero">
            <input type="submit" name="submit" value="Enviar">
            
        </form>
        <?php
        if (isset($_POST['numero'])) {
        
            $numero = $_POST['numero'];
            $flag = 0;
            
            for ($i = 2; $i < $numero; $i++) {
                
                $resultado = $numero % $i;
                
                if ($resultado == 0) {
                    $flag = 1;
                }
            }
            
            if ($flag == 1) {
                
                echo '<br> El numero no es primo';
                
            } else {
                
                echo '<br> El numero es primo';
                
            }
        }
        ?>
    </body>
</html>
