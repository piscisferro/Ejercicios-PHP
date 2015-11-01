<!DOCTYPE html>
<!--
Ejercicio 13
Escribe un programa que ordene tres números enteros introducidos por teclado.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 13</title>
    </head>
    <body>
        <h3>Este programa ordena 3 numeros enteros introducidos por teclado</h3>
        
        <form action="index.php" method="post">
            
           Primer numero: <input type="number" name="a" placeholder="1" min="0" step="1"> <br>
           Segundo numero: <input type="number" name="b" placeholder="1" min="0" step="1"> <br>
           Tercer numero: <input type="number" name="c" placeholder="1" min="0" step="1"><br>
           <input type="submit" name="submit" value="Ordenar!">
            
        </form>
        
        <?php
        
        if (isset($_REQUEST['submit'])) {
            
            $a = $_REQUEST['a'];
            $b = $_REQUEST['b'];
            $c = $_REQUEST['c'];
            
            $mayor = ($a > $b && $a > $c)? $a : ($b > $a && $b > $c)? $b : $c ($c > $a && $c > $b)? $c : $a;
            $menor = ($a < $b && $a < $c)? $a : ($b < $a && $b < $c)? $b : ($c < $a && $c < $b)? $c : $a;
            $medio = ($a < $mayor && $a > $menor)? $a : ($b < $mayor && $b > $menor)? $b : ($c < $mayor && $c > $menor)? $c : $a;
            
            echo "de mayor a menor: ", $mayor, ", ", $medio,", ", $menor;
            
            
        }
        
    
        ?>
    </body>
</html>
