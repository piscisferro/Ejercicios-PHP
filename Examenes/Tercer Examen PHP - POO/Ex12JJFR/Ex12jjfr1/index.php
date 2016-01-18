<!DOCTYPE html>
<!--
1. Una empresa está desarrollando una aplicación para llevar la gestión integral de un hotel. El primer
paso será definir la clase Habitacion con los atributos y métodos necesarios. Sobre cada habitación
se necesita saber su número, el tipo – clásica, superior o suite – y su estado – libre, reservada u
ocupada. La clase debe almacenar información sobre el número total de habitaciones y sobre el
número de habitaciones que quedan libres. Siempre que se crea una habitación nueva, su estado
es “libre”. El método reserva debe poner el estado en “reservada” en caso de que esté libre (y debe
decrementar el total de habitaciones libres); por el contrario, en caso de estar ya “reservada” u
“ocupada”, se debe mostrar el correspondiente mensaje de error. El método ocupa debe poner el
estado en “ocupada”, independientemente del estado que tuviera anteriormente. El siguiente código
del programa principal debe dar la salida que se muestra:

Autor Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'Habitacion.php';
        $h1 = new Habitacion(237, "clásica");
        $h2 = new Habitacion(418, "suite");
        $h3 = new Habitacion(217, "superior");
        $h2->reserva();
        $h3->ocupa();
        echo "Hay ".Habitacion::getTotalHabitaciones()." habitaciones.<br>";
        echo "Quedan ".Habitacion::getHabitacionesLibres()." libres.<br>";
        echo $h2."<br>";
        $h2->reserva();
        echo $h3."<br>";
        $h3->reserva();
        ?>
    </body>
</html>
