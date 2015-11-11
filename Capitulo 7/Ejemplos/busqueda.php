<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="post" action="#">
            Buscar en el campo nombre de la tabla de clientes:
            <input type="text" name="buscar">
            <input type="submit" value="Buscar">
        </form>

        <?php
        // Si enviamos el formulario
        if (isset($_POST['buscar'])) {
            // Guardamos en la variable buscar el valor del input buscar
            $buscar = $_POST['buscar'];
            // Conectamos al servidor
            $conexion = mysql_connect("localhost", "root", "");
            // Seleccionamos la base de datos
            mysql_select_db("banco", $conexion);
            // Charset
            mysql_set_charset('utf8');
            
            // Consulta sql 
            $sql = "SELECT * FROM cliente WHERE nombre LIKE '%$buscar%' ORDER BY nombre";
            // Realizamos la consulta y la guardamos en $resultado
            $resultado = mysql_query($sql, $conexion);
        ?>

        <table border = '1'>
            <tr>
                <td><b>DNI</b></td>
                <td><b>Nombre</b></td>
                <td><b>Dirección</b></td>
                <td><b>Teléfono</b></td>
            </tr>

            <?php
                // Mientras haya resultados. Imprimimos en pantalla
                while ($registro = mysql_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>".$registro["dni"]."</td>";
                    echo "<td>".$registro["nombre"]."</td>";
                    echo "<td>".$registro["direccion"]."</td>";
                    echo "<td>".$registro["telefono"]."</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>
