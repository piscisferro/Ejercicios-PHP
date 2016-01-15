<!DOCTYPE html>
<!--
Ejercicio 2
Crea la clase Vehiculo, así como las clases Bicicleta y Coche como subclases de la primera. Para la
clase Vehiculo, crea los métodos de clase getVehiculosCreados() y getKmTotales(); así como el
método de instancia getKmRecorridos(). Crea también algún método específico para cada una de
las subclases. Prueba las clases creadas mediante una aplicación que realice, al menos, las siguientes
acciones:
• Anda con la bicicleta
• Haz el caballito con la bicicleta
• Anda con el coche
• Quema rueda con el coche
• Ver kilometraje de la bicicleta
• Ver kilometraje del coche
• Ver kilometraje total

Autor: Juan Jose Fernandez Romero
-->
<?php

session_start();

if (!isset($_SESSION["vehiculosCreados"])) {
    $_SESSION["vehiculosCreados"] = 0;
} 

if (!isset($_SESSION["KmTotales"])) {
    $_SESSION["KmTotales"] = 0;
} 

if (!isset($_SESSION["Mensaje"])) {
    $_SESSION["Mensaje"] = "";
} 

if (!isset($_SESSION["KmRecorridos"])) {
    $_SESSION["KmRecorridos"] = 0;
} 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <div id="UI">
            <p>Vehiculos Creados: <?=$_SESSION["vehiculosCreados"]?></p>
            <p>Km Totales: <?=$_SESSION["KmTotales"]?></p>
            <p>Mensaje: <?=$_SESSION["Mensaje"]?></p>
        </div>
        
    </body>
</html>
