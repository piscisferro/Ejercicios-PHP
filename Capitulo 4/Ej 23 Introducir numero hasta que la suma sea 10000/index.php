<!DOCTYPE html>
<!--
Ejercicio 23
Escribe un programa que permita ir introduciendo una serie indeterminada de números hasta que la
suma de ellos supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 23</title>
    </head>
    <body>
        <h3>Podras introducir numeros hasta que su suma total sea 10000 o mas</h3>
    
        <?php
        
        
        // Recogemos el valor total globalmente.
        if (isset($_POST['total'])) {
            $total = $_POST['total'];
        } else {
            // Inicializa la primera vez que entramos
            $total = 0;
        }
        
        // Recogemos el valor contador globalmente.
        if (isset($_POST['contador'])) {
            $contador = $_POST['contador'];
        } else {
            // Inicializa la primera vez que entramos
            $contador = 0;
        }
        
        
        // Comprobamos si hay algo en el input a al vez que comprobamos si es la primera
        // vez que entra
        if (!isset($_POST['numero'])) {
            
            echo '<form action="index.php" method="post">';
            echo 'Numero: <input type="number" name="numero" min="0" autofocus>';
            echo '<input type="hidden" name="total" value="', $total,'">';
            echo '<input type="hidden" name="contador" value="', $contador,'">';
            echo '<br><input type="submit" name="submit" value="mandar">';
            
        } // Fin de la primera iteraccion
        
        // Si ya ha entrado y ha puesto algo
        else {
            
            // Recogemos el total y el numero
            $numero = $_POST['numero'];
            
            // Actualizamos el valor de total
            $total += $numero;
            
            // Incrementamos contador
            $contador++;
            
            // Primero comprobamos si el total es mayor o menos a 10.000
            if ($total < 10000) {
                
                // Si es menor que 10.000 volveremos a pintar el formulario
                
                echo '<form action="index.php" method="post">';
                echo 'Numero: <input type="number" name="numero" min="0" autofocus>';
                echo '<input type="hidden" name="total" value="', $total,'">';
                echo '<input type="hidden" name="contador" value="', $contador,'">';
                echo '<br><input type="submit" name="submit" value="mandar">';
                
                
            } else {
                
                echo 'La suma de los numeros ha superado los 10.000 el total es: ', $total;
                
            }
            
            
        }
        
        
        ?>
    </body>
</html>
