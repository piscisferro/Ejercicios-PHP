<!DOCTYPE html>
<!--
Ejercicio 13
Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 13</title>
    </head>
    <body>
        
        <h3>Introduce 10 numeros y te dira cuantos son positivos y cuantos negativos</h3>
        <?php
        
        // Si le ha dado a submit
        if (isset($_POST['submit'])) {
         
            // Inicializamos los contadores de positivos y negativos
            $contadorNegativo = 0;
            $contadorPositivo = 0;
            
            // Bucle para contar los numeros y determinar si son positivos o negativos
            for ($i = 0; $i < 10; $i++) {
                
                if ($_POST["numero$i"] >= 0) {
                    
                    $contadorPositivo++;
                    
                } else {
                    
                    $contadorNegativo++;
                    
                }  
            }
            
            // Imprimimos en HTML el numero de positivos y negativos.
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
