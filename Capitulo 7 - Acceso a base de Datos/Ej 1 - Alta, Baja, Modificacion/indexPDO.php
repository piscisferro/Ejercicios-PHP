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
            
            input {
                
                text-align: center;
                
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
        try {
            // Conectamos a la base de datos
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos";
            die ("Error: " . $e->getMessage());
        }
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
                <form action="indexPDO.php" method="post">
                    <td><input type="text" name="dni" placeholder="DNI" autofocus></td>
                    <td><input type="text" name="nombre" placeholder="Nombre"></td>
                    <td><input type="text" name="direccion" placeholder="Direccion"></td>
                    <td><input type="number" name="telefono" placeholder="Telefono" min="0" max="999999999"></td>
                    <td><input type="submit" name="crear" value="Crear"></td>
                </form>
            </tr>
            
            <?php 
            
            // Consulta sql select all
            $consulta = $conexion->query('SELECT * FROM cliente');
            
            // Si damos al boton Crear, lanzamos la funcion de alta
            if (isset($_POST["crear"])) {
                alta($conexion);
            }
            
            // Si damos a algun boton modificar, lanzamos la funcion update
            if (isset($_POST['update'])) {
                update($conexion);
            }
            
            // Si damos a algun boton borrar, lanzamos la funcion borrar
            if (isset($_POST["borrar"])) {
                borrar($conexion);
            }
            
            // Listado de clientes del banco 
            listado($consulta);
            ?>
            
            
        </table>
    </body>
    
    <?php 
        // Funcion listado. Esta funcion muestra en formato tabla todas las filas de la tabla clientes
        // por parametro pasamos la sentencia SQL   
        function listado ($sentencia) {
            // Mientras haya registros en la tabla
            while ($registro = $sentencia->fetchObject()) {

                // Boton borrado, en HTML
                $botonBorrado = '<form action="indexPDO.php" method="post">'
                  . '<input type="hidden" name="dni" value="' . $registro->dni . '">'
                  . '<input type="submit" name="borrar" value="Borrar"></form>';

                // Boton modificar, en HTML
                $botonModificar = '<form action="indexPDO.php" method="post">'
                  . '<input type="hidden" name="dni" value="' . $registro->dni . '">'
                  . '<input type="submit" name="modificar" value="Modificar"></form>';
                
                
                // Si hemos dado al boton modificar pondremos la linea correspondiente al dni como formulario
                if (isset($_POST['modificar']) && $registro->dni == $_POST['dni']) {
                    
                    // Formulario en formato tabla
                    echo '<tr><form action="indexPDO.php" method="post">';
                    echo '<td><input type="text" name="dni" placeholder="' . $registro->dni . '" autofocus></td>';
                    echo '<td><input type="text" name="nombre" placeholder="' . $registro->nombre . '"></td>';
                    echo '<td><input type="text" name="direccion" placeholder="' . $registro->direccion . '"></td>';
                    echo '<td><input type="number" name="telefono" placeholder="' . $registro->telefono . '" min="0" max="999999999"></td>';
                    echo '<td><input type="hidden" name="dniActual" value="'.$registro->dni.'">'
                    . '<input type="submit" name="update" value="Modificar"><input type="submit" name="" value="Cancelar"></td>';
                    echo '</form></tr>';
                    
                } else { // Listado normal. 
                    echo '<tr>';
                    echo '<td>' . $registro->dni . '</td>';
                    echo '<td>' . $registro->nombre . '</td>';
                    echo '<td>' . $registro->direccion . '</td>';
                    echo '<td>' . $registro->telefono . '</td>';
                    echo '<td>' . $botonBorrado . $botonModificar . '</td>';
                    echo '</tr>';
                }
            }
        }
        
        // Funcion alta, aqui damos de alta nuevas entradas para la base de datos
        function alta ($conexion) {
            
            // Recogemos los datos del formulario
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            
            // Creamos una variable con la consulta insert
            $insert = "INSERT INTO cliente (dni, nombre, direccion, telefono)"
              . "VALUES ('$dni', '$nombre', '$direccion', '$telefono')";
            
            // La ejecutamos en el servidor
            $conexion->exec($insert);
            
            // Refrescamos la pagina para actualizar la informacion.
            header("refresh: 0;");
        }
        
        function borrar($conexion) {
            
            // Recogemos el codigo dni del formulario
            $borrar = $_POST['dni'];
            
            // Creamos una variable con la consulta delete para borrar la fila 
            $delete = "DELETE FROM cliente WHERE dni='$borrar'";
            
            // La ejecutamos en el servidor
            $conexion->exec($delete);
            
            // Refrescamos la pagina para actualizar la informacion.
            header("refresh: 0;");
            
        }
        
        function update($conexion) {
            
            // Recogemos los datos del formulario
            $dniActual = $_POST['dniActual']; // Este hace falta para buscar el registro en la BD
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            
            // Creamos una variable con la consulta update para modificar la fila
            $update = "UPDATE cliente SET dni='$dni', nombre='$nombre', direccion='$direccion',"
              . "telefono=$telefono WHERE dni='$dniActual'";
            
            // La ejecutamos en el servidor
            $conexion->exec($update);
            
            // Refrescamos la pagina para actualizar la informacion.
            header("refresh: 0;");
            
        }
    ?>
</html>