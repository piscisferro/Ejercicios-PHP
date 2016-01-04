<!DOCTYPE html>
<!--
Ejercicio 1
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.

Creado por: Juan Jose Fernandez Romero
-->
<?php 

// Inicia la sesion
session_start(); 

// Si no esta definido el total, es que es la primera vez que se entra, se pone a 0
if(!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
} 

// Se pone a 0 el contador la primera vez que se entra
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ej1 Media de numeros</title>
    </head>
    <body>
        <h3>Calcula la media</h3>
        Este programa calcula la media de los numeros que se van introduciendo hasta que se introduzca
        un numero negativo.
        
        <form action="index.php" method="post">
            <input type="number" name="numero" placeholder="0" autofocus>
            <input type="submit" id="enviar" value="¡Enviar!">
        </form>
        
        <?php
        
        // Si se ha enviado el formulario
        if (isset($_POST['numero'])) {
            
            // Si han enviado el formulario vacio
            if ($_POST['numero'] == "") {
                // Lo tomamos como 0 asi que no se suma nada y sube el contador
                $_SESSION['contador']++;
            } 
            // Si hay un numero mayor a 0 en el formulario
            else if ($_POST['numero'] >= 0) {
                // Lo sumamos al total
                $_SESSION['total']+= $_POST['numero'];
                // Incrementamos el contador
                $_SESSION['contador']++;
            } 
            // Si el numero es menor a 0 (es decir, negativo)
            else {
                // Creamos un boton para recargar
                echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
                // Desactivamos el boton submit
                echo '<script>document.getElementById("enviar").disabled = true;</script>';
                echo '<br>';
                
                // Mostramos por pantalla la media.
                echo 'La media es: ', ($_SESSION['total'] / $_SESSION['contador']);
                
                // Destruimos la sesion.
                session_destroy();
            }
        }
        ?>
    </body>
</html>
