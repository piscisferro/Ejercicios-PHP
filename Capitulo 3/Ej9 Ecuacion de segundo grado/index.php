<!DOCTYPE html>
<!--
Ejercicio 9
Realiza un programa que resuelva una ecuación de segundo grado (del tipo ax2 + bx + c = 0).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 9</title>
    </head>
    <body>
        
        <h3>Este Programa soluciona ecuaciones de segundo grado del tipo ax^2 + bx + c = 0</h3>
        <form action="index.php" method="post">
            Introduce a:
            <br><input type="number" name="a"><br>
            Introduce b: 
            <br><input type="number" name="b"><br>
            Introduce c: 
            <br><input type="number" name="c"><br>
            <input type="submit" value="Calcular">
        </form>
        
        
        <?php
        
        if (isset($_POST['a'], $_POST['b'], $_POST['c'])) {
            
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            
            $resultado1 = (-$b + sqrt(($b*$b) - (4*$a*$c))) / (2*$a);
            $resultado2 = (-$b - sqrt(($b*$b) - (4*$a*$c))) / (2*$a);
            
            if (!is_nan($resultado1) && !is_nan($resultado2)) {
                echo "Los resultados de x son: <br> resultado 1 = ", $resultado1;
                echo "<br> resultado 2 = ", $resultado2;
            } else {
                
                echo "no tiene solucion";
                
            }
            
            
            
        }
        
        
        
        ?>
    </body>
</html>
