<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 10</title>
    </head>
    <body>
        
        
        <?php
        
        
        // Si no es la primera vez que entramos
        // O lo que es lo mismo, si han mandado submit
        if (isset($_POST['submit'])) {
         
            // Cogemos el numero
            $numero = $_POST['numero'];
            // Cogemos el valor hidden Total
            $total = $_POST['total'];
            
            // Cogemos el valor hidden del contador
            $contadornumero = $_POST['contador'];
            
            // Si el numero es negativo
            if ($numero < 0) {
                
                // Hacemos la media
                $media = $total / $contadornumero;
                
                // Lo mostramos por pantalla
                echo 'El total es: ', $total;
                echo '<br>El numero de numeros introducidos es: ', $contadornumero;
                echo '<br>La media es: ', $media;
                
                
                
            } else {
                
                // Si el numero es mayor a 0 lo añadimos al total y sumamos al contador
                $total += $numero;
                $contadornumero++;
                
                // Imprimimos el formulario
                echo '<form action="index.php" method="post">';
                echo '<input type="number" name="numero" placeholder="numero" autofocus>';
                echo '<input type="hidden" name="contador" value="', $contadornumero,'">';
                echo '<input type="hidden" name="total" value="', $total,'">';
                echo '<br><input type="submit" name="submit" value="Enviar">';
                echo '</form>';
                
            }
            
        } else { 
            
            // Inicializamos variables
            $contadornumero = 0;
            $total = 0;
            
            ///////////
            // Inicializa formulario la primera vez que entramos
            ///////////
            echo '<form action="index.php" method="post">';
            echo '<input type="number" name="numero" placeholder="numero" autofocus>';
            echo '<input type="hidden" name="contador" value="', $contadornumero,'">';
            echo '<input type="hidden" name="total" value="', $total,'">';
            echo '<br><input type="submit" name="submit" value="Enviar">';
            
            echo '</form>';
            
        }
       
        ?>
    </body>
</html>
