<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            // Nos conectamos al servidor como root
            $conexion = mysql_connect("localhost", "root", "");

            // Seleccionamos la base de datos Banco del servidor $conexion
            mysql_select_db("banco", $conexion);
            // Charset
            mysql_set_charset('utf8');

            // Hacemos una consulta y la guardamos en variable.
            $consulta = mysql_query('SELECT * FROM empleado WHERE dni="13579"', $conexion);

            // mysql_result solo muestra un resultado concreto y ademas de una fila concreta.
            // mysql_result("variable", "fila", "nombre de campo") 
            echo "Nombre: ".mysql_result($consulta, 0, "nombre")."<br>";
            echo "Cargo: ".mysql_result($consulta, 0, "cargo")."<br>";
            echo "Sueldo: ".mysql_result($consulta, 0, "sueldo")."€<br>";
        ?>
    </body>
</html>