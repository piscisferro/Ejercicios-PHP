<!DOCTYPE html>
<!--
Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP
para familiarizarte con éste último.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<table border="1" width="400">';
        // Primera Linea - Dia
        echo '<tr>'; 
        echo '<td>', 'Lunes', '</td>', '<td>', 'Martes', '</td>', '<td>', 'Miercoles', '</td>';
        echo '<td>', 'Jueves', '</td>', '<td>', 'Viernes', '</td>';
        echo '</tr>'; 
        // Fin
        // Segunda Linea - 1º Hora
        echo '<tr>'; 
        echo '<td>', 'DWES', '</td>', '<td>', 'DWEC', '</td>', '<td>', 'DWES', '</td>';
        echo '<td>', 'DWEC', '</td>', '<td>', 'DIW', '</td>';
        echo '</tr>';
        // Fin
        // Tercera Linea - 2º Hora
        echo '<tr>';
        echo '<td>', 'DWES', '</td>', '<td>', 'DWEC', '</td>', '<td>', 'DWES', '</td>';
        echo '<td>', 'DWEC', '</td>', '<td>', 'DIW', '</td>';
        echo '</tr>';
        // Fin
        // Cuarta Linea - 3º Hora
        echo '<tr>';
        echo '<td>', 'DWES', '</td>', '<td>', 'DWEC', '</td>', '<td>', 'DWES', '</td>';
        echo '<td>', 'DWEC', '</td>', '<td>', 'DIW', '</td>';
        echo '</tr>';
        // Fin
        // Quinta Linea - Recreo
        echo '<tr>';
        echo '<td colspan ="5">', '<center> Recreo </center>', '</td>';
        echo '</tr>';
        // Fin
        // Sexta Linea - 4º Hora
        echo '<tr>';
        echo '<td>', 'EIE', '</td>', '<td>', 'DAW', '</td>', '<td>', 'HLC', '</td>';
        echo '<td>', 'EIE', '</td>', '<td>', 'DIW', '</td>';
        echo '</tr>';
        // Fin
        // Septima Linea - 5º Hora
        echo '<tr>';
        echo '<td>', 'DIW', '</td>', '<td>', 'DAW', '</td>', '<td>', 'HLC', '</td>';
        echo '<td>', 'EIE', '</td>', '<td>', 'DWES', '</td>';
        echo '</tr>';
        // Fin
        // Octava Linea - 6º Hora
        echo '<tr>';
        echo '<td>', 'DIW', '</td>', '<td>', 'DAW', '</td>', '<td>', 'HLC', '</td>';
        echo '<td>', 'EIE', '</td>', '<td>', 'DWES', '</td>';
        echo '</tr>';
        // Fin
        echo '</table>';
        ?>
    </body>
</html>
