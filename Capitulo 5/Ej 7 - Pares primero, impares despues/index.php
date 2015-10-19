<!DOCTYPE html>
<!--
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pares primero, Impares despues</title>
        
        <style>
            
            .primerArray {
                color: red;
                margin: 0 15px;
                
            }
            
            .segundoArray {
                color: blue;
                margin: 0 15px;
            }
            
        </style>
        
    </head>
    <body>
        <h3>Pares primero, Impares despues</h3>
        <p>Se generara un array aleatorio y luego otro mas con los numeros del primer array
        ordenados, primero pares, luego impares</p>
        
        <?php
        $array1; // Variable para el Array1
        $array2; // Variable para el Array 2
        $arrayLength = 20; // Variable para la longitud del array
        $contador = 0; // Contador subindice auxiliar para Array 2
        
        // Generamos el primer Array y ademas asignamos los pares al segundo Array
        for ($i = 0; $i < $arrayLength; $i++) {
            // Generamos el numero aleatorio para la posicion del array
            $array1[$i] = rand(0, 100);
            // Imprimimos en HTML la posicion con el numero generado
            echo '<span class="primerArray">', $array1[$i], '</span>';
            
            // Si es par
            if(($array1[$i] % 2) == 0) {
                // Asignamos a la posicion contador el valor de array1 actual
                $array2[$contador] = $array1[$i];
                // Incrementamos la variable contador
                $contador++;
            }
        } // Fin for
        
        // Asignamos los valores impares de array1 a array2
        for ($i = 0; $i < $arrayLength; $i++ ) {
            // Si es impar
            if (($array1[$i] % 2) != 0) {
                //Asignamos a la posicion contador el valor del array1
                $array2[$contador] = $array1[$i];
                // Incrementamos la variable contador
                $contador++;
            }
        }
        
        // Salto de Linea
        echo '<br>';
        
        // Pintamos array2
        for ($i = 0; $i < $arrayLength; $i++) {
            echo '<span class="segundoArray">', $array2[$i],'</span>';
        }
        ?>
    </body>
</html>
