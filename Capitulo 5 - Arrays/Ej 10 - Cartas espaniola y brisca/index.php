<!DOCTYPE html>
<!--
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Brisca</title>
        <style>
            
            span {
                
                margin: 0 10px 0 0;
                
            }
            
        </style>
        
    </head>
    <body>
        <h3>Brisca</h3>
        
        <?php
        $cartasJugadas[] = ""; // Array que contendran las cartas que se han jugado
        $puntosTotales = 0; // Puntuacion total de las cartas
        
        // Array asociativo con las puntuaciones de cada carta
        $puntos = array ( 'As' => 11, 'Dos' => 0, 'Tres' => 10, 'Cuatro' => 0, 'Cinco' => 0,
                          'Seis' => 0, 'Siete' => 0, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4);
        
        // Array con los 4 palos
        $palo = ['Oros', 'Bastos', 'Espadas', 'Copas'];
        
        // Array con las 10 cartas
        $cartas = ['As', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Sota', 'Caballo', 'Rey'];
        
        // Bucle donde sacaremos las 10 cartas al azar
        for ($i = 0; $i < 10; $i++) {
            
            // Le damos a palo Carta un palo aleatorio del array
            $paloCarta = $palo[rand(0, 3)];
            // Le damos a numeroCarta un numero aleatorio del array cartas
            $numeroCarta = $cartas[rand(0, 9)];
            
            // Puntos que da la carta como es array asociativo usamos $numeroCarta
            // para saber los puntos que tiene asignado 
            $puntosCarta = $puntos[$numeroCarta];
            
            // Para guardar las cartas que vamos jugando lo haremos guardandolas mediante
            // String, que se comparara con otros string en un array para asi saber que cartas
            // hemos jugado
            $cartaSacada = $numeroCarta . " de " . $paloCarta;
            
            // Si la carta que hemos sacado no esta en el array de cartas jugadas
            if (!in_array($cartaSacada, $cartasJugadas)) {
                // Primero la añadimos a las cartas jugadas
                $cartasJugadas[] = $cartaSacada;
                // Ahora sumamos los puntos de la carta jugada a los puntos totales
                $puntosTotales +=  $puntosCarta;
                
                echo '<span>', $cartaSacada, '</span>';
            } else {
                $i--;
            }
        }
        
        echo '<br> Puntuacion total: ', $puntosTotales;
        ?>
    </body>
</html>
