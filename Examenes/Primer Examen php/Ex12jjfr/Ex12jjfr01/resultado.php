<!DOCTYPE html>
<!--
1. Escribe un programa que pida 6 números uno detrás de otro (no se pueden pedir los 6 en la misma página) y
que, a continuación, muestre el máximo, el mínimo y el número de primos (solo la cantidad).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <h3>Resultados</h3>
        <?php
        
        // Si envian el campo vacio, se pondra un 0
        if ($_POST['numero'] == "") {
            $numero = 0;
        } else {
            $numero = $_POST['numero'];
        }
        
        // Asignamos el campo contadorPrimos a su variable
        $contadorPrimos = $_POST['contadorPrimos'];
        // Asignamos el campo maximo a su variable
        $maximo = $_POST['maximo'];
        // Asignamos el campo minimo a su variable
        $minimo = $_POST['minimo'];

        // Si $numero es mayor al $maximo actual
        if ($maximo < $numero) {
            // Asignamos a $maximo el valor de $numero
            $maximo = $numero;
        }

        // Si $numero es menor al $minimo actual
        if ($minimo > $numero) {
            // Asignamos a $minimo el valor de $numero
            $minimo = $numero;
        }
        
        // Si el numero es primo incrementamos la variable $contadorPrimos
        if (esPrimo($numero)) {
           $contadorPrimos++;
        }
        
        
        // Devuelve true si es primo o false si no lo es
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
        
        echo 'El numero maximo es: ', $maximo;
        echo '<br> El numero minimo es: ', $minimo;
        echo '<br> Hay ', $contadorPrimos, ' primos';
        
        ?>
        
        
    </body>
</html>