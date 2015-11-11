<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>
            Base de datos <u>banco</u><br>
            Tabla <u>cliente</u><br>
        </h2>
        <?php
            // Establecemos conexion
            $conexion = mysql_connect("localhost", "root", "");
            
            // Seleccionamos la bd banco
            mysql_select_db("banco", $conexion);
            // Charset
            mysql_set_charset('utf8');
            // Hacemos la consulta y la guardamos en una variable.
            $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);
        ?>

        <table border="1">
            <tr>
                <td><b>DNI</b></td>
                <td><b>Nombre</b></td>
                <td><b>Dirección</b></td>
                <td><b>Teléfono</b></td>
            </tr>

            <?php
            // Este while en cada ciclo, mysql_fetch_array($consulta), va sacando una 
            // fila a la vez que asignamos esa fila a $registro hasta que ya no hay mas filas
            // mysql_fetch_array($consulta) guarda los datos como Array asociativo siendo la clave
            // el nombre del campo.
            while ($registro = mysql_fetch_array($consulta)){
                echo "<tr>";
                echo "<td>".$registro["dni"]."</td>";
                echo "<td>".$registro["nombre"]."</td>";
                echo "<td>".$registro["direccion"]."</td>";
                echo "<td>".$registro["telefono"]."</td>";
                echo "</tr>";
            }
            
            // Cerramos la conexion.
            mysql_close($conexion); 
            ?>
        </table>
    </body>
</html>
