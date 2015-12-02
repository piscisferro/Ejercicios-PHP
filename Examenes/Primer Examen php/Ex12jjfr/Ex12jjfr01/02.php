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
        <h3>Ejercicio 1</h3>
        <p>Este programa pide 6 numeros, luego mostrara el maximo y el minimo</p>
        
        <form action="03.php" method="post">
            <?php
            
            // Si envian el campo vacio, se pondra un 0
            if ($_POST['numero'] == "") {
                $numero = 0;
            } else {
                $numero = $_POST['numero'];
            }
            
            // Asignamos el campo contador a su variable
            $contador = $_POST['contador'];
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
            
            // Incrementamos la variable contador
            $contador++;
            
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
            
            ?>
            
            Numeros: <input type="number" name="numero" placeholder="0" autofocus>
            <input type="hidden" name="contador" value="<?php echo $contador; ?>">
            <input type="hidden" name="contadorPrimos" value="<?php echo $contadorPrimos; ?>">
            <input type="hidden" name="maximo" value="<?php echo $maximo; ?>">
            <input type="hidden" name="minimo" value="<?php echo $minimo; ?>">
            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>