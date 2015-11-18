<!DOCTYPE html>
<!--
Ejercicio 1
Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla cliente
de la base de datos banco.
• Para realizar el listado bastará un SELECT, tal y como se ha visto en los ejemplos.
• El alta se realizará mediante un formulario donde se especificarán todos los campos del nuevo
registro. Luego esos datos se enviarán a una página que ejecutará INSERT.
• Para realizar una baja, se pedirá el DNI del cliente mediante un formulario y a continuación
se ejecutará DELETE para borrar el registro cuyo DNI coincida con el introducido.
• La modificación se realiza mediante UPDATE. Se pedirá previamente

Create By Juan Jose Fernandez Romero
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Baja Modificacion</title>
        
        <style>
            
            body {
                background-color: gray;
                
            }
            
            table {
                
                border-spacing: 0px;
                display: table;
                border-collapse: collapse;
                
            }
            
            tr:first-child {
                
                font-weight: bold;
                text-align: center;
                
            }
            
            td {
                text-align: center;
                display: table-cell;
                border: 1px solid black;
                width: 150px;
                height: 30px;
                
                
            }
            
            form {
                
                display: inline-block;
                
            }
            
            tr:nth-child(odd) {
                
                background-color: lightgrey;
                
            }
            
            tr:nth-child(even) {
                
                background-color: lightblue;
                
            }
            
            
        </style>
        
    </head>
    <body>
        <?php
        $conexion = mysql_connect("localhost", "root", "");
        
        if (!$conexion)
            echo "Error al conectar a la base de datos";
        
        mysql_select_db("banco", $conexion);
        mysql_set_charset('utf8');
        
        $consulta = mysql_query('SELECT * FROM cliente', $conexion);
        ?>
        
        <table>
            <tr>
                <td>DNI</td>
                <td>Nombre</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td></td>
            </tr>
            
            <!-- Fila para añadir una nueva entrada -->
            <tr>
                <form action="indexMySql.php" method="post">
                    <td><input type="text" name="dni" placeholder="DNI" autofocus></td>
                    <td><input type="text" name="nombre" placeholder="Nombre"></td>
                    <td><input type="text" name="direccion" placeholder="Direccion"></td>
                    <td><input type="number" name="telefono" placeholder="Telefono" min="0" max="999999999"></td>
                    <td><input type="submit" name="crear" value="Crear"></td>
                </form>
            </tr>
            
            <?php 
            
            if (isset($_POST["crear"])) {
                alta();
            }
            
            if (isset($_POST['update'])) {
                update();
            }
            
            if (isset($_POST["borrar"])) {
                borrar();
            }
            
            // Listado de clientes del banco 
            listado($consulta);
            ?>
            
            
        </table>
    </body>
    
    <?php 
    
        function listado ($sentencia) {
            while ($registro = mysql_fetch_array($sentencia)) {

                $botonBorrado = '<form action="indexMySql.php" method="post">'
                  . '<input type="hidden" name="dni" value="' . $registro['dni'] . '">'
                  . '<input type="submit" name="borrar" value="Borrar"></form>';

                $botonModificar = '<form action="indexMySql.php" method="post">'
                  . '<input type="hidden" name="dni" value="' . $registro['dni'] . '">'
                  . '<input type="submit" name="modificar" value="Modificar"></form>';
                
                
                
                if (isset($_POST['modificar']) && $registro['dni'] == $_POST['dni']) {
                    
                    echo '<tr><form action="indexMySql.php" method="post">';
                    echo '<td><input type="text" name="dni" placeholder="DNI" autofocus></td>';
                    echo '<td><input type="text" name="nombre" placeholder="Nombre"></td>';
                    echo '<td><input type="text" name="direccion" placeholder="Direccion"></td>';
                    echo '<td><input type="number" name="telefono" placeholder="Telefono" min="0" max="999999999"></td>';
                    echo '<td><input type="hidden" name="dniActual" value="'.$registro['dni'].'">'
                    . '<input type="submit" name="update" value="Modificar"></td>';
                    echo '</form></tr>';
                    
                } else {
                    echo '<tr>';
                    echo '<td>' . $registro['dni'] . '</td>';
                    echo '<td>' . $registro['nombre'] . '</td>';
                    echo '<td>' . $registro['direccion'] . '</td>';
                    echo '<td>' . $registro['telefono'] . '</td>';
                    echo '<td>' . $botonBorrado . $botonModificar . '</td>';
                    echo '</tr>';
                }
            }
        }
        
        function alta () {
            
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            
            $insert = "INSERT INTO cliente (dni, nombre, direccion, telefono)"
              . "VALUES ('$dni', '$nombre', '$direccion', '$telefono')";
            
            mysql_query($insert);
            
            header("refresh: 0;");
        }
        
        function borrar() {
            
            $borrar = $_POST['dni'];
            
            $delete = "DELETE FROM cliente WHERE dni='$borrar'";
            
            mysql_query($delete);
            
            header("refresh: 0;");
            
        }
        
        function update() {
            
            $dniActual = $_POST['dniActual'];
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            
            $update = "UPDATE cliente SET dni='$dni', nombre='$nombre', direccion='$direccion',"
              . "telefono=$telefono WHERE dni='$dniActual'";
            
            mysql_query($update);
            
            header("refresh: 0;");
            
        }
    ?>
</html>