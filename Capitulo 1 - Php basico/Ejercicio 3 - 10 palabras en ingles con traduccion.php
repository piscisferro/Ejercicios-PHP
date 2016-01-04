<!DOCTYPE html>
<!--
Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
<table> de HTML.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<table border =\"1\" width=\"200\">";
        echo "<tr>", "<td>", "car", "</td>", "<td>", "coche", "</td>", "</tr>";
        echo "<tr>", "<td>", "table", "</td>", "<td>", "mesa", "</td>", "</tr>";
        echo "<tr>", "<td>", "apple", "</td>", "<td>", "manzana", "</td>", "</tr>";
        echo "<tr>", "<td>", "orange", "</td>", "<td>", "naranja", "</td>", "</tr>";
        echo "<tr>", "<td>", "fish", "</td>", "<td>", "pescado", "</td>", "</tr>";
        echo "<tr>", "<td>", "ship", "</td>", "<td>", "barco", "</td>", "</tr>";
        echo "<tr>", "<td>", "dog", "</td>", "<td>", "perro", "</td>", "</tr>";
        echo "<tr>", "<td>", "cat", "</td>", "<td>", "gato", "</td>", "</tr>";
        echo "<tr>", "<td>", "bird", "</td>", "<td>", "pajaro", "</td>", "</tr>";
        echo "<tr>", "<td>", "chicken", "</td>", "<td>", "pollo", "</td>", "</tr>";
        echo "</table>";
        ?>
    </body>
</html>
