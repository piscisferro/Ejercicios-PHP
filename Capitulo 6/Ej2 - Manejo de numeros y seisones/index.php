<!DOCTYPE html>
<!--
Ejercicio 2
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones.

Creado por: Juan Jose Fernandez Romero
-->

<?php

// Inicializamos la sesion
session_start();

// Inicializamos el contador de numeros
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} 

// Inicializamos el contador de Impares
if (!isset($_SESSION['contadorImpares'])) {
    $_SESSION['contadorImpares'] = 0;
}

// Inicializamos el Total Impares
if (!isset($_SESSION['totalImpares'])) {
    $_SESSION['totalImpares'] = 0;
}

// Inicializamos el mayor de pares con el numero minimo posible
if (!isset($_SESSION['mayorPares'])) {
    $_SESSION['mayorPares'] = -PHP_INT_MAX;
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ej2 - Manejo de numeros</title>
    </head>
    <body>
        <h3>Cuenta numeros introducidos, calcula la media de Impares y el mayor par</h3>
        
        <form action="index.php" method="post">
            <input type="number" name="numero" placeholder="0" autofocus>
            <input type="submit" id="enviar" value="¡Enviar!">
        </form>
        <?php
        
        // Si se ha enviado el formulario
        if (isset($_POST['numero'])) {
            
            // Si el formulario se ha enviado vacio
            if ($_POST['numero'] == '') {
                // Lo tomamos como 0 e incrementamos el contador
                $_SESSION['contador']++;
                
            } 
            // Si el numero es mayor o igual a 0
            else if ($_POST['numero'] >= 0) {
                // Incrementamos contador
                $_SESSION['contador']++;
                
                // SI el numero es par
                if (($_POST['numero'] % 2) == 0) {
                    
                    // Si es par y ademas es mayor al mayor de los pares
                    if ($_SESSION['mayorPares'] < $_POST['numero']) {
                        // Asignamos el nuevo par como el mayor
                        $_SESSION['mayorPares'] = $_POST['numero'];
                    }
                } else { // Si el nuemro es impar
                    
                    // Incrementamo el contador de impares
                    $_SESSION['contadorImpares']++;
                    // Sumamos el impar al total
                    $_SESSION['totalImpares'] += $_POST['numero'];
                }
                
                
            } else {
                
                // Creamos un boton para recargar
                echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
                // Desactivamos el boton submit
                echo '<script>document.getElementById("enviar").disabled = true;</script>';
                echo '<br>';
                
                // Mostramos la cantidad de numeros introducidos
                echo 'Se han introducido ', $_SESSION['contador'], ' numeros <br>';
                
                // Mostramos el mayor par
                echo 'El mayor par ha sido ', $_SESSION['mayorPares'], '<br>';
                
                // Mostramos por pantalla la media.
                echo 'La media de impares es: ', ($_SESSION['totalImpares'] / $_SESSION['contadorImpares']);
                
                // Destruimos la sesion.
                session_destroy();
            }  
        }
        
        
        ?>
    </body>
</html>
