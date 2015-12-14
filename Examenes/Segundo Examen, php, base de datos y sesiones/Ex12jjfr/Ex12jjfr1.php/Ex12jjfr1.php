<!DOCTYPE>
<!--
Create By Juan Jose Fernandez Romero
-->
<?php

// Inicializamos la sesion
session_start();

// Inicializamos el contador de numeros
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} 

// Inicializamos el sumatorio de numeros
if (!isset($_SESSION['sumatorio'])) {
    $_SESSION['sumatorio'] = 0;
} 

// Inicializamos el contador de Primos
if (!isset($_SESSION['contadorPrimos'])) {
    $_SESSION['contadorPrimos'] = 0;
}

// Inicializamos el minimo
if (!isset($_SESSION['minimo'])) {
    $_SESSION['minimo'] = PHP_INT_MAX;
}

// Inicializamos el maximo numero minimo posible
if (!isset($_SESSION['maximo'])) {
    $_SESSION['maximo'] = -PHP_INT_MAX;
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>EX12jjfr1</title>
    </head>
    <body>
        <h3>Cuenta numeros introducidos, calcula la media, el maximo, el minimo y los primos que hay</h3>
        
        <p>Si se manda el campo vacio se contara como 0</p>
        
        <form action="Ex12jjfr1.php" method="post">
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
                
                // Asignamos la variable
                $numero = $_POST['numero'];
                
                // Incrementamos contador
                $_SESSION['contador']++;
                
                // Incrementamos el sumatorio con el numero
                $_SESSION['sumatorio'] += $numero;
                
                // Comprobamos si es el mayor o el menor
                if ($_SESSION['maximo'] < $numero) {
                    
                    $_SESSION['maximo'] = $numero;
                    
                }    
                
                if ($_SESSION['minimo'] > $numero) {
                    
                    $_SESSION['minimo'] = $numero;
                    
                }
                
                // Comprobamos si es primo
                if (esPrimo($numero)) {
                    
                    $_SESSION['contadorPrimos']++;
                    
                }
            } else {
                
                // Creamos un boton para recargar
                echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
                // Desactivamos el boton submit
                echo '<script>document.getElementById("enviar").disabled = true;</script>';
                echo '<br>';
                
                // Mostramos la cantidad de numeros introducidos
                echo 'Se han introducido ', $_SESSION['contador'], ' numeros <br>';
                
                // Mostramos la cantidad de numeros introducidos
                echo 'Se han introducido ', $_SESSION['contadorPrimos'], ' numeros Primos <br>';
                
                // Mostramos el maximo
                echo 'El numero maximo ha sido ', $_SESSION['maximo'], '<br>';
                
                // Mostramos el minimo
                echo 'El numero minimo ha sido ', $_SESSION['minimo'], '<br>';
                
                // Mostramos por pantalla la media.
                echo 'La media es: ', ($_SESSION['sumatorio'] / $_SESSION['contador']);
                
                // Destruimos la sesion.
                session_destroy();
            }  
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
    </body>
</html>
