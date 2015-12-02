<!DOCTYPE html>
<!--
4. Crea un array bidimensional de 10 filas por 9 columnas relleno con números aleatorios entre 1 y 1000 (ambos
incluidos). Los números se pueden repetir. Se deben mostrar todos los números bien alineados en filas y columnas.
Muestra el máximo de entre los números capicúa en azul y los números adyacentes en verde. Si el máximo capicúa
se repite, se puede colorear uno cualquiera de ellos o todos, como al alumno le resulte más fácil.

Alumno Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
        
        <style> 
            
            span {
                display: inline-block;
                width: 25px;
                padding-left: 10px;
            }
            
            .negro {
                color: black;
            }
            
            .verde {
                
                color: greenyellow;
            }
            
            .azul {
                
                color: cyan;
                
            }
           
            
        </style>
    </head>
    <body>
        <?php
        
        $arrayHeight = 10;
        $arrayWidth = 9;
        $matriz;
        $maximo = -PHP_INT_MAX;
        $posicionI = 0;
        $posicionX = 0;
        
        for ($i = 0; $i < $arrayHeight; $i++) {
            for ($x = 0; $x < $arrayWidth; $x++) {
                $matriz[$i][$x] = rand(1, 1000);
                
                $capicua = esCapicua($matriz[$i][$x]);
                
                if ($capicua == 1) {
                    if ($maximo <= $matriz[$i][$x]) {
                        $maximo = $matriz[$i][$x];
                        $posicionI = $i;
                        $posicionX = $x;
                    }
                }
            }
        }
        
        // Marcamos los adyacentes poniendolos en negativo
        for ($i = -1; $i < 2; $i++) {
            for ($x = -1; $x < 2; $x++) {
                if ($posicionI + $i > 0 && $posicionI + $i < $arrayHeight) {
                  if ($posicionX + $x > 0 && $posicionX + $x < $arrayWidth) {
                    $matriz[$posicionI + $i][$posicionX + $x] = -($matriz[$posicionI + $i][$posicionX + $x]);
                  }
                }
            }
        }
        
        
        for ($i = 0; $i < $arrayHeight; $i++) {
            for ($x = 0; $x < $arrayWidth; $x++) {
                
                if ($matriz[$i][$x] == $maximo) {
                    
                    echo '<span class="azul">', $matriz[$i][$x], '</span>';
                    
                } else if ($matriz[$i][$x] < 0) {
                    
                    echo '<span class="verde">', -$matriz[$i][$x], '</span>';
                } else {
                    
                    echo '<span class="negro">', $matriz[$i][$x], '</span>';
                    
                }
            }
            
            echo '<br>';
            
        }
            
        // Funcion para saber si un numero es capicua o no
        function esCapicua($numero) {

            $temp = 0;
            $numero2 = $numero; 
            
            while ($numero2 > 0) {
                $temp = ($temp * 10) + ($numero2 % 10);
                $numero2 = $numero2 /10;
            }
            
            if ($temp == $numero) {
                $resultado = 1;
            } else {
                $resultado = 0;
            }            
            return $resultado;
	}
        
        ?>
    </body>
</html>
