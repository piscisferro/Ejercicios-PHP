<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.

Creado por Juan Jose Fernandez Romero
-->
<?php

// Iniciamos la sesion
session_start();

// Inicializamos el total
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

// Inicializamos el contador 
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ej3 Numeros hasta que su suma supere 10.000</title>
    </head>
    <body>
        <h3>Introduce numeros hasta que su suma supere 10.000</h3>
        Este programa permite introducir numeros hasta que su suma supere 10.000
        cuando esto suceda mostrara el total acumulado, el contador de numeros introducidos
        y la media.
        
        <form action="index.php" method="post">
            <input type="number" name="numero" min="0" placeholder="0" autofocus>
            <input type="submit" id="enviar" value="¡Enviar!">
        </form>
        
        <?php
        // Si el formulario ha sido enviado
        if (isset($_POST['numero'])) {
            
            // Si el formulario viene vacio lo tomamos como 0
            if ($_POST['numero'] == "") {
                $_SESSION['contador']++;
            } else { // Si el formulario viene con un numero
                // Se suma ese numero al total
                $_SESSION['total']+= $_POST['numero'];
                // Se incrementa el contador
                $_SESSION['contador']++;
            }
            
            // Si el total es mayor a 10.000
            if ($_SESSION['total'] > 10000) {
                
                // Creamos un boton para recargar
                echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
                // Desactivamos el boton submit
                echo '<script>document.getElementById("enviar").disabled = true;</script>';
                echo '<br>';
                
                // Mostramos la cantidad de numeros introducidos
                echo 'Se han introducido ', $_SESSION['contador'], ' numeros <br>';
                
                // Mostramos el total acumulado
                echo 'Total acumulado ', $_SESSION['total'], '<br>';
                
                // Mostramos la media.
                echo 'La media de los numeros introducidos: ', round(($_SESSION['total'] / $_SESSION['contador']), 2); 
                
                // Destruimos la sesion.
                session_destroy();
                
            }  
        }
        ?>
    </body>
</html>
