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

Ej Examen

Modifica el ejercicio Expocoches Campanillas realizado en clase teniendo en cuenta que ahora las
entradas están numeradas y, además, se pueden reservar. Para simplificar el ejercicio, las entradas
solo se pueden reservar o comprar de una en una y la entrada número cero se puede despreciar.
Añade “Reservar entrada” a las opciones del menú. Para reservar una entrada el usuario dará su
nombre y se le asignará la primera entrada que estuviera libre. La opción “Vender entrada” permitirá
vender una única entrada y se indicará al usuario el número de la entrada vendida. Al elegir la opción
“Vender entrada”, además de preguntar por la zona, se preguntará al usuario si tenía reserva, en
caso afirmativo, se preguntará por el nombre y, tras comprobar la reserva, se le venderá la entrada. Si
por el contrario, el usuario dice que no tenía reserva, se vende la entrada directamente. Crea las tres
zonas con poco aforo (por ej. 10, 20 y 7) para que el programa sea “manejable”. La manera más
sencilla de implementar este sistema, es tener como atributo para cada zona un array de cadenas de
caracteres con la información necesaria para cada elemento (cada entrada): “LIBRE”, “VENDIDA” o el
nombre de la persona que tiene la reserva. El método __toString() debe mostrar el estado de cada
entrada dentro de la zona.
Por ejemplo: 1:VENDIDA 2:VENDIDA 3:Pepe 4:Marta 5:VENDIDA 6:LIBRE 7:LIBRE

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
    $principal = new Zona("principal", 10);
    // Guardamos la Zona en sesion
    $_SESSION["principal"] = serialize($principal);
} else {
    // Si ya esta creado, guardamos el objeto en una variable
    $principal = unserialize($_SESSION["principal"]);
}

// Si la zona principal no esta ya creada, la creamos
if (!isset($_SESSION["compra-venta"])) {
    // Creamos la nueva zona como compra-venta y 200 entradas
    $compraVenta = new Zona("compra-venta", 20);
    // Guardamos la Zona en sesion
    $_SESSION["compra-venta"] = serialize($compraVenta);
} else {
    // Si ya esta creado, guardamos el objeto en una variable
    $compraVenta = unserialize($_SESSION["compra-venta"]);
}

// Si la zona principal no esta ya creada, la creamos
if (!isset($_SESSION["VIP"])) {
    // Creamos la nueva zona como VIP y 25 entradas
    $vip = new Zona("VIP", 7);
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
        // Ejecutamos la funcion de Chequeo Reserva
        chequeoReserva();
        
        // Ejecutamos la funcion Chequeo Compra
        chequeoCompra()
        ?>
        <h3>Comprar Entrada</h3>
        <form action="compra.php" method="post">
            Zona: 
            <select name="zona">
                <option value="principal" selected>Principal</option>
                <option value="compra-venta">Compra-Venta</option>
                <option value="VIP">VIP</option>
            </select>
            <input type="submit" name="comprar" value="Comprar">
        </form>
        <h3>Reservar Entradas</h3>
        <form action="index.php" method="post">
            Zona: 
            <select name="zonaReserva">
                <option value="principal" selected>Principal</option>
                <option value="compra-venta">Compra-Venta</option>
                <option value="VIP">VIP</option>
            </select>
            <input type="text" name="nombre" required>
            <input type="submit" name="reservar" value="Reservar">
        </form>
        <?php
        // Ejecutamos la funcion de mostrar Datos
        mostrarDatos();
        ?>
    </body>
</html>

<?php

// Funcion mostrar Datos que muestra los datos de cada zona
function mostrarDatos() {
    // Con el metodo toString del objeto Zona, aqui se imprimira la frase especificada en el toString
    // de cada objeto
    echo "<p>". unserialize($_SESSION["principal"]) ."</p>";
    echo "<p>". unserialize($_SESSION["compra-venta"]) ."</p>";
    echo "<p>". unserialize($_SESSION["VIP"]) ."</p>";
}

// Funcion para reservar
function chequeoReserva() {
    
    // Si hemos dado al boton de reservar
    if (isset($_POST["reservar"])) {
        
        // Unserializamos la zona desde SESSION
        $zona = unserialize($_SESSION[$_POST["zonaReserva"]]);
        
        // Ejecutamos el metodo reservar y guardamos el resultado en $reserva
        $reserva = $zona->reservar($_POST["nombre"]);
        
        // Guardamos en session los cambios
        $_SESSION[$_POST["zonaReserva"]] = serialize($zona);
        
        // Dependiendo de si la reserva fue un exito o no se imprimira un mensaje
        if ($reserva) {
            echo '<p class="exito">La reserva ha sido un exito</p>';            
        } else {
            echo '<p class="fallo">La reserva ha fallado</p>';
        }  
    } 
}

// Funcion para vender entradas que viene desde la pagina compra.php
function chequeoCompra() {

    // Si se ha dado al boton comprar
    if (isset($_POST["compra"]) || isset($_POST["compraReservada"])) {

        // Escogemos la zona de Session y la guardamos en una variable
        $zona = unserialize($_SESSION[$_POST["zona"]]);
        
        if (isset($_POST["nombre"])) {
            // Ejecutamos el metodo vender
            $venta = $zona->vender($_POST["nombre"]);
        } else {
            // Ejecutamos el metodo vender
            $venta = $zona->vender("Libre");
        }
        
        // Serializamos otra vez la zona y la guardamos en Session con los cambios hechos
        $_SESSION[$_POST["zona"]] = serialize($zona);

        // Dependiendo de si la venta ha sido un exito o no, imprimimos un mensaje u otro
        if ($venta) {
            echo '<p class="exito">La venta ha sido un exito</p>';
        } else {
            echo '<p class="fallo">La venta ha fallado, quizas no queden entradas para la zona deseada.</p>';
        }
    }
}

?>




























































