<!DOCTYPE html>
<!--
Ejercicio 3

Crea la clase DadoPoker. Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J,
7 y 8 . Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor
aleatorio para el objeto al que se le aplica el método. Crea también el método nombreFigura(), que
diga cuál es la figura que ha salido en la última tirada del dado en cuestión. Crea, por último, el
método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados.
Realiza una aplicación que permita tirar un cubilete con cinco dados de poker.

Create By Juan Jose Fernandez Romero
-->
<?php

// Iniciamos la sesion
session_start();

// Incluimos la clase dadoPoker.php
require 'dadoPoker.php';

if (isset($_POST["crea"])) {
    // Creamos el dado
    $dado = new DadoPoker();
    // Lo guardamos en sesion
    $_SESSION["dado"] = serialize($dado);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DadoPoker</title>
    </head>
    <body>
        <h1>DadoPoker</h1>
        <?php
        
        // Si no tenemos ningun dado guardado en session
        if (!isset($_SESSION['dado'])) {
            
            // Mostramos el boton para crear dado
            ?>
            <form action="index.php" method="post">
                <input type="submit" name="crea" value="Crear Dado">
            </form>
        
        
            <?php
        } else { // Si tenemos el dado ya creado, mostramos el boton para lanzarlo
            ?>
            <form action="index.php" method="post">
                <input type="submit" name="tira" value="Tira el Dado">
            </form>   
        <?php
        } // Fin del else
        
        // Si pulsamos tirar el dado
        if (isset($_POST['tira'])) {
            
            // Recuperamos el dado de session
            $dado = unserialize($_SESSION['dado']);
            
            // Tiramos el dado
            $dado->tira();
            // Recogemos la figura que haya salido
            $figura = $dado->nombreFigura();
            // Recogemos la cantidad de veces que hemos tirado
            $tiradas = $dado->getTiradasTotales();
            
            // Volvemos a guardar el dado en session
            $_SESSION['dado'] = serialize($dado);
            
            // Ahora mostramos en HTML los resultados
            ?>
        
            <p>Figura: <?=$figura?></p>
            <p>Tiradas Totales: <?=$tiradas?></p>
        
            <?php
        } // Fin del if
        ?>
    </body>
</html>
