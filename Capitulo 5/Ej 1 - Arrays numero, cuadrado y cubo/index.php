<!DOCTYPE html>
<!--
Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arrays</title>
        <style>
            td {
                padding: 5px;
                width: 50px;
                height: 25px;
            }
            
            td:nth-child(even) {
                background-color: beige;
            }
            
            td:nth-child(odd) {
                background-color: lightgrey;
            }
        </style>
    </head>
    <body>
        <?php
        
           $numero; // Variable de numero
           $cuadrado; // Variable almacena cuadrado de numero
           $cubo; // Variable almacena cubo de numero
        // Inicializacion del Array numero
        for ($i = 0; $i < 20; $i++) {
            
            $numero[$i] = rand(0, 100);
        }
        
        // Inicializacion del Array Cuadrado
        for ($i = 0; $i < 20; $i++) {
            
            $cuadrado[$i] = $numero[$i] * $numero[$i];
        }
        
        // Inicializacion del Array Cubo
        for ($i = 0; $i < 20; $i++) {
            
            $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];
        }
        ?>
        
        <table border="1">
            <tr>
                <td>Numero</td>
                <?php 
                // Imprimimos los Array dentro de Table
                for ($i = 0; $i < 20; $i++) {
                    echo "<td>", $numero[$i] ,"</td>";
                }
                ?> 
                
            </tr>
            
            <tr>
                <td>Cuadrado</td>
                <?php 
                // Imprimimos los Array dentro de Table
                for ($i = 0; $i < 20; $i++) {
                 echo "<td>", $cuadrado[$i] ,"</td>";
                }
                ?> 
            </tr>
            
            <tr>
                <td>Cuadrado</td>
                <?php 
                // Imprimimos los Array dentro de Table
                for ($i = 0; $i < 20; $i++) {
                    echo "<td>", $cubo[$i] ,"</td>";
                    }
                ?> 
            </tr>
        </table>
    </body>
</html>
