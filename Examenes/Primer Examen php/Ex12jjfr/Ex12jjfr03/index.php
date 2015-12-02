<!DOCTYPE html>
<!--
3. En ajedrez, el valor de las piezas se mide en peones según la siguiente tabla:
Pieza   Dama     Torre    Alfil    Caballo   Peón
Valor 9 peones 5 peones 3 peones  2 peones  1 peón

Realiza un programa que vaya generando al azar las piezas que capturan dos jugadores durante una partida. Un
jugador se rinde cuando el contrario captura el equivalente a 9 peones (o más).

Ejemplo:
Fichas capturadas:
Alfil negro (3 peones)
Caballo blanco (2 peones)
Peón blanco (1 peones)
Torre negro (5 peones)

Las negras se rinden, han perdido el equivalente a 11 peones.
Hay que tener en cuenta que cada jugador tiene la posibilidad de capturar algunas de las siguientes piezas (no
más): 1 dama, 2 torres, 2 alfiles, 2 caballos y 8 peones.
El valor de cada pieza se debe almacenar en un array asociativo.

Alumno Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
        
        $piezas = ["dama" => 9, "torre" => 5, "alfil" => 3, "caballo" => 2, "peon" => 1];
        
        $pieza = ["dama", "torre", "alfil", "caballo", "peon"];
        
        $enJuegoBlanco = ["dama" => 1, "torre" => 2, "alfil" => 2, "caballo" => 2, "peon" => 8];
        $enJuegoNegro = ["dama" => 1, "torre" => 2, "alfil" => 2, "caballo" => 2, "peon" => 8];
        
        $jugadorBlanco = 0;
        $jugadorNegro = 0;
        
        $turnos = 0;
        $salir = false;
        
        do {
        
            if ($turnos % 2 == 0) {
                
                $sacada = $pieza[rand(0, 4)];
                
                if ($enJuegoBlanco[$sacada] > 0) {
                    
                    $jugadorBlanco += $piezas[$sacada];
                    $enJuegoBlanco[$sacada]--;
                    
                } else {
                   $turnos--;
                } 
                
                echo 'El jugador blanco ha sacado ', $sacada, ' + ', $piezas[$sacada], ' puntos<br>';
                $turnos++;
                
            } else {
                
                $sacada = $pieza[rand(0, 4)];
                
                if ($enJuegoNegro[$sacada] > 0) {
                    
                    $jugadorNegro += $piezas[$sacada];
                    $enJuegoNegro[$sacada]--;
                    
                } else {
                   $turnos--;
                }  
                echo 'El jugador negro ha sacado ', $sacada, ' + ', $piezas[$sacada], ' puntos<br>';
                $turnos++;
            }
            
            if ($jugadorBlanco >= 11 || $jugadorNegro >= 11) {
                $salir = true;
            }
            
        } while (!$salir);
        
        if ($jugadorBlanco >= 11) {
            echo '<br>El Jugador Negro se ha rendido, ha perdido ', $jugadorBlanco, ' peones';
        }
        
        if ($jugadorNegro >= 11) {
            echo '<br>El Jugador Blanco se ha rendido, ha perdido ', $jugadorNegro, ' peones';
        }
        
        ?>
    </body>
</html>
