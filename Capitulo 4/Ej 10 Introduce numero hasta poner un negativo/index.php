<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 10</title>
    </head>
    <body>
        
        
        <?php
        
        if (isset($_POST['submit'])) {
         
            $numero = $_POST['numero'];
            $total = $_POST['total'];
            $contadornumero = $_POST['contador'];
            
            if ($numero < 0) {
                
                $media = $total / $contadornumero;
                
                echo 'El total es: ', $total;
                echo '<br>El numero de numeros introducidos es: ', $contadornumero;
                echo '<br>La media es: ', $media;
                
                
                
            } else {
                
                $total += $numero;
                $contadornumero++;
                
                echo '<form action="index.php" method="post">';
                echo '<input type="number" name="numero" placeholder="numero" autofocus>';
                echo '<input type="hidden" name="contador" value="', $contadornumero,'">';
                echo '<input type="hidden" name="total" value="', $total,'">';
                echo '<br><input type="submit" name="submit" value="Enviar">';
                echo '</form>';
                
            }
            
        } else { 
            
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
