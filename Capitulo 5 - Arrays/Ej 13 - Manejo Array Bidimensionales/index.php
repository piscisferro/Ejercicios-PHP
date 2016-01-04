<!DOCTYPE html>
<!--
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendidos
entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:

• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manejo de Arrays Bidimensionales</title>
        
        <style>
        
            span {
                
                margin-right: 15px;
                
            }
            
            .verde {
                color: greenyellow;
                font-weight: bold;
            }
            
            .negro {
                color: black;
            }
            
            .azul {
                color: blue;
                font-weight: bold;
            }
            
        </style>
        
    </head>
    <body>
        <?php
   
        // Variables del Array
        $numeros; // Array Bidimensional donde guardaremos todos los numeros generados
        $arrayHeight = 6; // "Ancho" del array bidimensional
        $arrayWidth = 9; // "Altura" del array bidimensional
      
        // Variables para generar Array
        $numerosUsados[] = 0; // Array donde guardaremos los numeros usados
        $numeroAleatorio; // Numero generado aleatoriamente
        
        // Minimo del Array Bidimensional
        $minimo = PHP_INT_MAX; // Variable con el numero minimo del array bidimensional 
        $posicionI; // Posicion I (width) del minimo
        $posicionX; // Posicion X (height) del minimo
        
        // Minimo Diagnoales
        $minimoD1 = PHP_INT_MAX; // Variable con el numero minimo de una diagonal 
        $minimoD2 = PHP_INT_MAX; // Variable con el numero minimo de la otra diagonal 
                
        
        // Generamos el Array bidimensional
        for ($i = 0; $i < $arrayHeight; $i++){ // Filas
            // Columnas
            for ($x = 0; $x < $arrayWidth; $x++) {
                // Generamos el numero y lo metemos en la variable
                $numeroAleatorio = rand(100, 999);
                
                // Comprobamos que el numero generado no se encuentra en los numeros usados
                if (!in_array($numeroAleatorio, $numerosUsados)) {
                    // Si no esta usado, lo metemos en el array bidimensional
                    $numeros[$i][$x] = $numeroAleatorio;
                    // Y ademas lo añadimos al array de numeros usados
                    $numerosUsados[] = $numeroAleatorio;
                    
                    // Imprimimos en HTML
                    echo '<span>', $numeros[$i][$x], '</span>';
                            
                } else {
                    // En el caso de que se repita el numero, repetimos la iteraccion
                    $x--;
                } 
            }
            
            // Salto de linea entre linea y linea 
            echo '<br>';
        }
        
        /******************************************************************
         * Desechamos esta solucion no porque este mal, sino porque mas
         * adelante necesitaremos la posicion y esta solucion no la da 
         * 
        // Ahora buscaremos el minimo del array bidimensional 
        for ($i = 0; $i < $arrayWidth; $i++) {
            
            
            // Buscamos el minimo en todos los arrays
            if ($minimo > min($numeros[$i])) {
                $minimo = min($numeros[$i]);
            }             
             
        }
        ********************************************************************/
        
        
        // Ahora buscamos el minimo del array bidimensional y su posicion
        for ($i = 0; $i < $arrayHeight; $i++) {
            for ($x = 0; $x < $arrayWidth; $x++) {
                
                if ($minimo > $numeros[$i][$x]) {
                    $minimo = $numeros[$i][$x];
                    $posicionI = $i;
                    $posicionX = $x;
                }
            }
        }   
        
        // Ahora buscamos el minimo de las dos diagonales (que toman como punto
        // central el numero minimo), Buscaremos en la parte de "arriba" 
        
        $salto; // Variable auxiliar, es la que en cada salto de linea
                // suma y resta a posicionX
                // 
        // Bucle para buscar en las diagonales superiores
        for ($i = ($posicionI - 1), $salto = 1; $i >= 0; $i--, $salto++) {
            
            // Si la posicion - salto es mayor a 0 (no se sale del tablero)
            if (($posicionX - $salto) >= 0) {
                // Si el minimo actual es mayor que el numero en la posicion
                if ($minimoD1 > $numeros[$i][$posicionX - $salto]) {
                    // Guardamos en el minimo el numero de la posicion
                    $minimoD1 = $numeros[$i][$posicionX - $salto];
                }
            }
            // Si la posicion + salto es mayor a arrayHeight (no se sale del tablero)
            if (($posicionX + $salto) < $arrayWidth) {
                // Si el minimo actual es mayor que el numero en la posicion
                if ($minimoD2 > $numeros[$i][$posicionX + $salto]) {
                    // Guardamos en el minimo el numero de la posicion
                    $minimoD2 = $numeros[$i][$posicionX + $salto];
                }
            }   
        } 
        
        // Bucle con la parte de "abajo" de las diganoles. Se pone posicionI + 1 para obviar
        // la parte central
        for ($i = ($posicionI + 1), $salto = 1; $i < $arrayHeight; $i++, $salto++) {
            
            // Si la posicion - salto es mayor a 0 (no se sale del tablero)
            if (($posicionX - $salto) >= 0) {
                // Si el minimo actual es mayor que el numero en la posicion
                if ($minimoD2 > $numeros[$i][$posicionX - $salto]) {
                    // Guardamos en el minimo el numero de la posicion
                    $minimoD2 = $numeros[$i][$posicionX - $salto];
                }
            }
            // Si la posicion + salto es mayor a arrayHeight (no se sale del tablero)
            if (($posicionX + $salto) < $arrayWidth) {
                // Si el minimo actual es mayor que el numero en la posicion
                if ($minimoD1 > $numeros[$i][$posicionX + $salto]) {
                    // Guardamos en el minimo el numero de la posicion
                    $minimoD1 = $numeros[$i][$posicionX + $salto];
                }
            }
        }
        
        
        
        
        echo '<br><br>';
        
        // Pintamos el Array con los colores
        for ($i = 0; $i < $arrayHeight; $i++){ // Filas
            // Columnas
            for ($x = 0; $x < $arrayWidth; $x++) {
            
                if ($numeros[$i][$x] == $minimoD1) {
                    
                    echo '<span class="verde">', $numeros[$i][$x], '</span>';
                    
                } else if ($numeros[$i][$x] == $minimoD2) {
                    
                    echo '<span class="verde">', $numeros[$i][$x], '</span>';
                    
                } else if ($numeros[$i][$x] == $minimo) {
                    
                    echo '<span class="azul">', $numeros[$i][$x], '</span>';
                    
                } else {
                    
                    echo '<span class="negro">', $numeros[$i][$x], '</span>';
                    
                }
            }
            
            echo '<br>';
            
        }
        
        ?>
    </body>
</html>
