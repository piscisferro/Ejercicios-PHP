<!DOCTYPE html>
<!--
Ejercicio 4

Queremos gestionar la venta de entradas (no numeradas) de Expocoches Campanillas que tiene
3 zonas, la sala principal con 1000 entradas disponibles, la zona de compra-venta con 200 entradas
disponibles y la zona vip con 25 entradas disponibles. Hay que controlar que existen entradas
antes de venderlas. Define las clase Zona con sus atributos y métodos correspondientes y crea
un programa que permita vender las entradas. En la pantalla principal debe aparecer información
sobre las entradas disponibles y un formulario para vender entradas. Debemos indicar para qué
zona queremos las entradas y la cantidad de ellas. Lógicamente, el programa debe controlar que no
se puedan vender más entradas de la cuenta.

Autor: Juan Jose Fernandez Romero

-->
<?php 
////////////////////
// Como es un ejercicio demostrativo lo haremos todo en una Sesiones
////////////////////

// Clase Zona
require "Zona.php";

// Iniciamos la sesion
session_start();

// Si la zona principal no esta ya creada, la creamos
if (!isset($_SESSION["principal"])) {
    // Creamos la nueva zona como principal y 1000 entradas
    $principal = new Zona("principal", 1000);
    // Guardamos la Zona en sesion
    $_SESSION["principal"] = serialize($principal);
} else {
    // Si ya esta creado, guardamos el objeto en una variable
    $principal = unserialize($_SESSION["principal"]);
}

// Si la zona principal no esta ya creada, la creamos
if (!isset($_SESSION["compra-venta"])) {
    // Creamos la nueva zona como compra-venta y 200 entradas
    $compraVenta = new Zona("compra-venta", 200);
    // Guardamos la Zona en sesion
    $_SESSION["compra-venta"] = serialize($compraVenta);
} else {
    // Si ya esta creado, guardamos el objeto en una variable
    $compraVenta = unserialize($_SESSION["compra-venta"]);
}

// Si la zona principal no esta ya creada, la creamos
if (!isset($_SESSION["VIP"])) {
    // Creamos la nueva zona como VIP y 25 entradas
    $vip = new Zona("VIP", 25);
    // Guardamos la Zona en sesion
    $_SESSION["VIP"] = serialize($vip);
} else { 
    // Si ya esta creado, guardamos el objeto en una variable
    $vip = unserialize($_SESSION["VIP"]);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Expocoches Campanillas</title>
        <style>
            
            .exito {
                color: limegreen;
            }
            
            .fallo {
                color: red;
            }
            
        </style>
    </head>
    <body>
        <h2>Expocoches Campanillas</h2>
        <p>Bienvenido a Expocoches Campanillas. ¿Cuantas entradas desea comprar?</p>
        <?php 
        // Ejecutamos la funcion chequearCompra
        chequearCompra($principal, $compraVenta, $vip);
        ?>
        <form action="index.php" method="post">
            Zona: 
            <select name="zona">
                <option value="principal" selected>Principal</option>
                <option value="compra-venta">Compra-Venta</option>
                <option value="VIP">VIP</option>
            </select>
            Numero de entradas: <input type="number" min="1" placeholder="1" name="numeroEntradas" autofocus required>
            <input type="submit" name="submit" value="Comprar">
        </form>
        <?php
        // Ejecutamos la funcion de mostrar Datos
        mostrarDatos($principal, $compraVenta, $vip);
        ?>
    </body>
</html>

<?php

// Funcion mostrar Datos que muestra los datos de cada zona
function mostrarDatos($principal, $compraVenta, $vip) {
    // Con el metodo toString del objeto Zona, aqui se imprimira la frase especificada en el toString
    // de cada objeto
    echo "<p>". $principal ."</p>";
    echo "<p>". $compraVenta ."</p>";
    echo "<p>". $vip ."</p>";
}

// Funcion con la logica del programa
function chequearCompra($principal, $compraVenta, $vip) {

    // Si se ha dado al boton comprar
    if (isset($_POST["submit"])) {

        // Switch con las posibilidades de $_POST[zona]
        switch ($_POST["zona"]) {
            // En el caso de que sea la zona principal
            case "principal": 
                // Realizamos la venta de las entradas y guardamos en una variable si ha sido un exito o no
                $venta = $principal->vender($_POST["numeroEntradas"]);
                $_SESSION["principal"] = serialize($principal);
                break;

            case "compra-venta":
                // Realizamos la venta de las entradas y guardamos en una variable si ha sido un exito o no
                $venta = $compraVenta->vender($_POST["numeroEntradas"]);
                $_SESSION["compra-venta"] = serialize($compraVenta);
                break;

            case "VIP":
                // Realizamos la venta de las entradas y guardamos en una variable si ha sido un exito o no
                $venta = $vip->vender($_POST["numeroEntradas"]);
                $_SESSION["VIP"] = serialize($vip);
                break;
        }

        // Dependiendo de si la venta ha sido un exito o no, imprimimos un mensaje u otro
        if ($venta) {
            echo '<p class="exito">La venta ha sido un exito</p>';
        } else {
            echo '<p class="fallo">La venta ha fallado, quizas no queden entradas para la zona deseada.</p>';
        }
    }
}
?>




























































