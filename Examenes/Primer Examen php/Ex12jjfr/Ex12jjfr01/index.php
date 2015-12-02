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
        
        <form action="01.php" method="post">
            <?php
            $contador = 0; // Variable para contador
            $contadorPrimos = 0; // Variable para contador Primo
            $maximo = -PHP_INT_MAX;  // Variable para el maximo
            $minimo = PHP_INT_MAX; // Variable para el minimo
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
