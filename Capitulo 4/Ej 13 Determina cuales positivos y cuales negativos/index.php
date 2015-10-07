<!DOCTYPE html>
<!--
Ejercicio 13
Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 13</title>
    </head>
    <body>
        
        <h3>Introduce 10 numeros y te dira cuantos son positivos y cuantos negativos</h3>
        <?php
        
        if (isset($_POST['submit'])) {
         
            $contadorNegativo = 0;
            $contadorPositivo = 0;
            
            for ($i = 0; $i < 10; $i++) {
                
                if ($_POST["numero$i"] >= 0) {
                    
                    $contadorPositivo++;
                    
                } else {
                    
                    $contadorNegativo++;
                    
                }  
            }
            
            echo 'Hay ', $contadorPositivo ,' numeros positivos y ', $contadorNegativo , ' negativos';
            
        } else { 
            
            
            
            ///////////
            // Inicializa formulario la primera vez que entramos
            ///////////
            echo '<form action="index.php" method="post">';
            
                for ($i = 0; $i < 10; $i++) {
                    
                    echo '<input type="number" name="numero',$i,'">';

                }
            echo '<br><input type="submit" name="submit" value="Enviar"></form>';
              
        }
            
        
       
        ?>
    </body>
</html>
