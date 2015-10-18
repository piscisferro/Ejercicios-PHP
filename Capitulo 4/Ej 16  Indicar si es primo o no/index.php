<!DOCTYPE html>
<!--
Ejercicio 16
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 16</title>
    </head>
    <body>
        
        <h3>Introduce un numero para saber si es primo</h3>
        
        <form action="index.php" method="post">
            
            <input type="number" name="numero">
            <input type="submit" name="submit" value="Enviar">
            
        </form>
        <?php
        
        // Si ha metido numero:
        if (isset($_POST['numero'])) {
        
            // Recogemos el numero
            $numero = $_POST['numero'];
            // Variable flag para saber si es primo o no
            $flag = 0;
            
            // Bucle donde se comprueba si es primo dividiendo el numero introducido
            // desde 2 al numero mimso y comprando el modulo con 0
            for ($i = 2; $i < $numero; $i++) {
                
                $resultado = $numero % $i;
                
                if ($resultado == 0) {
                    $flag = 1;
                }
            } ////// Fin bucle
            
            // Determina si es primo o no dependiendo de $flag
            if ($flag == 1) {
                echo '<br> El numero no es primo';
            } else {
                echo '<br> El numero es primo';
            }
        }
        ?>
    </body>
</html>
