<!DOCTYPE html>
<!--
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Primos primeros, no primos despues</title>
        
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
        <h3>Primos primero, No primos despues</h3>
        <p>Se generara un array aleatorio y luego otro mas con los numeros del primer array
        ordenados, primero primos, luego no primos</p>
        
        <?php
        $array1; // Variable para el Array1
        $array2; // Variable para el Array 2
        $arrayLength = 10; // Variable para la longitud del array
        $contador = 0; // Contador subindice auxiliar para Array 2
        
        // Generamos el primer Array y ademas asignamos los primos al segundo Array
        for ($i = 0; $i < $arrayLength; $i++) {
            // Generamos el numero aleatorio para la posicion del array
            $array1[$i] = rand(0, 100);
            // Imprimimos en HTML la posicion con el numero generado
            echo '<span class="primerArray">', $array1[$i], '</span>';
            
            // Si es primo
            if (esPrimo($array1[$i])) {
                // Asignamos a array2 el numero actual de array1
                $array2[$contador] = $array1[$i];
                // Incrementamos contador
                $contador++;
            }
        } // Fin for
        
        // Asignamos los valores no primos de array1 a array2
        for ($i = 0; $i < $arrayLength; $i++ ) {
            // Si no es primo
            if (!esPrimo($array1[$i])) {
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
        
        
        // Devuelve true o false dependiendo si es 
        // primo o no
        function esPrimo($numero) {

            $primo = true;

            if ($numero == 0 || $numero == 1) {

                $primo = true;

            } else {

                for ($i = 2; $i < $numero; $i++) {

                    if (($numero % $i) == 0) {
                        $primo = false;
                    }
                }
            }
            return $primo;
        }
        
        ?>
    </body>
</html>
