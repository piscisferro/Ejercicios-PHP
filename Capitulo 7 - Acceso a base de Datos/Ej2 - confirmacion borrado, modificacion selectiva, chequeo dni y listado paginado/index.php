<!DOCTYPE html>
<!--
Ejercicio 2
Modifica el programa anterior añadiendo las siguientes mejoras:
• El listado debe aparecer paginado en caso de que haya muchos clientes.
• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en
el formulario.
• La opción de borrado debe pedir confirmación.
• Cuando se realice la modificación de los datos de un cliente, los campos que no se han
cambiado deberán permanecer inalterados en la base de datos.

Create By Juan Jose Fernandez Romero
-->
<?php 
// Al parecer el headerÇ(refresh: 0) suele dar muchos problemas, esta funcion
// ayuda a que no de problemas.
ob_start();

// Empezamos la sesion
session_start();

// Si es la primera vez que entramos
if (!isset($_SESSION['pagina'])) {
    // Ponemos pagina en sesion a 0
    $_SESSION['pagina'] = 0;
}

// Si orden no esta inicializada
if (!isset($_SESSION['orden'])) {
    // La inicializamos para asi que se ordene en funcion del dni
    $_SESSION['orden'] = "dni";
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Baja Modificacion eXtended</title>
        <style>
            body {
                background-color: gray;
                
            }
            
            .botones {
                
                background-color: white;
                
            }
            
            .error {
                
                background-color: red;
                color: black;
                font-weight: bold;
                
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
                width: 200px;
                height: 30px;
                
                
            }
            
            form {
                
                display: inline-block;
                
            }
            
            input {
                
                text-align: center;
                margin: 0 5px;
                
            }
            
            tr:nth-child(odd) {
                
                background-color: lightgrey;
                
            }
            
            tr:nth-child(even) {
                
                background-color: lightblue;
                
            }
            
            .submit {
                background: none;
                border: none; 
                padding: 0;
                font: inherit;
                font-weight: normal;
                cursor: pointer;
            }
            
            .submit:hover {
                
                text-decoration: underline;
                
            }
            
            .submit:active {
                
                color: red;
                
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
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="ordena" value="dni">
                        <input class="submit" type="submit" value="DNI">
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="ordena" value="nombre">
                        <input class="submit" type="submit" value="Nombre">
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="ordena" value="direccion">
                        <input class="submit" type="submit" value="Direccion">
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="ordena" value="telefono">
                        <input class="submit" type="submit" value="Telefono">
                    </form>                    
                </td>
                <td></td>
            </tr>
            
            <!-- Fila para añadir una nueva entrada -->
            <tr>
                <form action="index.php" method="post">
                    <td><input type="text" name="dni" placeholder="DNI"></td>
                    <td><input type="text" name="nombre" placeholder="Nombre"></td>
                    <td><input type="text" name="direccion" placeholder="Direccion"></td>
                    <td><input type="number" name="telefono" placeholder="Telefono" min="0" max="999999999"></td>
                    <td><input type="submit" name="crear" value="Crear"></td>
                </form>
            </tr>
            <?php
            // Funcion que lanza el manejo de paginas
            paginas($conexion);
            
            // Offset para el Limit de la consulta SQL
            $offset = ($_SESSION['pagina'] * 5);
            
            // Si damos a algun ordenar
            if (isset($_POST['ordena'])) {
                // Lanzamos la funcion ordena
                ordena();
            }
            
            // Consulta sql select all con el Limit para limitar cuantas filas se devolvera y el offset
            // para saber desde que fila empieza a contar.
            
            $sql = "SELECT * FROM cliente ORDER BY " . $_SESSION['orden'] . " LIMIT 5 OFFSET $offset";
            
            $consulta = $conexion->query($sql); 
            
            // Si damos al boton Crear, lanzamos la funcion de alta
            if (isset($_POST["crear"])) {
                alta($conexion);
            }
            
            // Si damos a algun boton modificar, lanzamos la funcion update
            if (isset($_POST['update'])) {
                update($conexion);
            }
            
            // Si damos a algun boton borrar, lanzamos la funcion borrar
            if (isset($_POST["borrarDefinitivo"])) {
                borrar($conexion);
            }
            
            // Listado de clientes del banco 
            listado($consulta);
            
            // Al parecer esto ayuda a que el header no de problemas.
            ob_end_flush();
            ?>
            <tr>
                <td colspan="5" class="botones">
                    <form action="index.php" method="post">
                        <input type="submit" name="primeraPagina" value="<-- Primera">
                        <input type="submit" name="rePagina" value="Anterior">
                        <input type="submit" name="avPagina" value="Siguiente">
                        <input type="submit" name="ultimaPagina" value="Ultima -->">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
    
<?php 
    /////////////////////////////////////////////////////////////////////
    ///////////////////////// Funcion Paginas ///////////////////////////
    /////////////////////////////////////////////////////////////////////
    // Funcion que controla el manejo de las paginas que se muestran para la
    // tabla
    function paginas($conexion) {

        // Consulta Select ALL para contar el total de filas
        $all = $conexion->query('SELECT * FROM cliente');
        $numeroFilas = $all->rowCount();

        // Si el boton primera pagina ha sido presionado
        if (isset($_POST['primeraPagina'])) {
            // Ponemos la sesion pagina a 0
            $_SESSION['pagina'] = 0;
        }

        // Si el boton pagina anterior ha sido presionado
        if (isset($_POST['rePagina'])) {
            // Si la session es mayor a 0
            if ($_SESSION['pagina'] > 0) {
                // Decrementamos el contador de pagina
                $_SESSION['pagina']--;
            }
        }

        // Si el boton pagina siguiente ha sido presionado
        if (isset($_POST['avPagina'])) {
            // Si la sesion es menor que el numero maximo de filas partido por Limit
            // 5 en este caso menos 1 (porque session pagina empieza en 0, no en 1)
            if ($_SESSION['pagina'] < (ceil($numeroFilas/5) - 1)) {
                // Incrementamos el contador de pagina
                $_SESSION['pagina']++;
            }
        }

        // Si el boton ultima pagina ha sido presionado
        if (isset($_POST['ultimaPagina'])) {
            // Nos vamos a la pagina numero filas / LIMIT (5 en este caso) 
            // menos 1 (porque session pagina empieza en 0, no en 1)
            $_SESSION['pagina'] = (ceil($numeroFilas/5) - 1);
        }
    }
    
    /////////////////////////////////////////////////////////////////////
    ///////////////////////// Funcion Ordena ///////////////////////////
    /////////////////////////////////////////////////////////////////////
    // Funcion que controla las peticiones para ordenar la lista por DNI,
    // Nombre, Direccion y Telefono
    function ordena() {
        
        // Guarda en sesion el tipod e ordenamiento
        $_SESSION['orden'] = $_POST['ordena'];
        
    }



    /////////////////////////////////////////////////////////////////////
    ///////////////////////// Funcion Listado ///////////////////////////
    /////////////////////////////////////////////////////////////////////
    // Funcion listado. Esta funcion muestra en formato tabla todas las filas de la tabla clientes
    // por parametro pasamos la sentencia SQL   
    function listado ($sentencia) {
        // Mientras haya registros en la tabla
        while ($registro = $sentencia->fetchObject()) {

            // Boton borrado, en HTML
            $botonBorrado = '<form action="index.php" method="post">'
              . '<input type="hidden" name="dni" value="' . $registro->dni . '">'
              . '<input type="submit" name="borrar" value="Borrar"></form>';

            // Boton borrado definitivo y cancelar
            $botonBorradoDef = '<form action="index.php" method="post">'
              . '<input type="hidden" name="dni" value="' . $registro->dni . '">'
              . '<input type="submit" name="borrarDefinitivo" value="Borrar">'
              . '<input type="submit" name="" value="Cancelar"></form>';

            // Boton modificar, en HTML
            $botonModificar = '<form action="index.php" method="post">'
              . '<input type="hidden" name="dni" value="' . $registro->dni . '">'
              . '<input type="submit" name="modificar" value="Modificar"></form>';


            // Si hemos dado al boton modificar pondremos la linea correspondiente al dni como formulario
            if (isset($_POST['modificar']) && $registro->dni == $_POST['dni']) {

                // Guardamos en sesion los valores a modificar
                $_SESSION['dni'] = $registro->dni;
                $_SESSION['nombre'] = $registro->nombre;
                $_SESSION['direccion'] = $registro->direccion;
                $_SESSION['telefono'] = $registro->telefono;
                
                // Formulario en formato tabla
                echo '<tr><form action="index.php" method="post">';
                echo '<td><input type="text" name="dni" placeholder="' . $registro->dni . '" autofocus></td>';
                echo '<td><input type="text" name="nombre" placeholder="' . $registro->nombre . '"></td>';
                echo '<td><input type="text" name="direccion" placeholder="' . $registro->direccion . '"></td>';
                echo '<td><input type="number" name="telefono" placeholder="' . $registro->telefono . '" min="0" max="999999999"></td>';
                echo '<td><input type="submit" name="update" value="Modificar"><input type="submit" name="" value="Cancelar"></td>';
                echo '</form></tr>';

            } else if (isset($_POST['borrar']) && $registro->dni == $_POST['dni']) { 
                // Si hemos pulsado borrar y ademas el dni coincide con el de la fila

                // Creamos la fila con la confirmacion del boton borrado
                echo '<tr>';
                echo '<td>' . $registro->dni . '</td>';
                echo '<td>' . $registro->nombre . '</td>';
                echo '<td>' . $registro->direccion . '</td>';
                echo '<td>' . $registro->telefono . '</td>';
                echo '<td>' . $botonBorradoDef . '</td>';
                echo '</tr>';

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

    ///////////////////////////////////////////////////////////////
    /////////////////////// Funcion Alta //////////////////////////
    ///////////////////////////////////////////////////////////////
    // Funcion Alta para dar de alta una nueva fila en la tabla de base de datos
    // Parametros: La conexion a la base de datos        
    function alta ($conexion) {

        // Recogemos los datos del formulario
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];

        // Consulta para comprobar si el DNI existe
        $comprobacion = $conexion->query("SELECT dni FROM cliente WHERE dni='$dni'");

        // Si hay mas de 0 fila significa que hay un dni ya con ese numero
        if ($comprobacion->rowCount() > 0) {

            // Imprimimos el error de que el DNI ya existe
            echo '<div class="error">DNI ya existe<div>';

        } else {
            // Creamos una variable con la consulta insert
            $insert = "INSERT INTO cliente (dni, nombre, direccion, telefono)"
              . "VALUES ('$dni', '$nombre', '$direccion', '$telefono')";

            // La ejecutamos en el servidor
            $conexion->exec($insert);

            // Refrescamos la pagina para actualizar la informacion.
            header("Refresh: 0");
        }
    }


    ///////////////////////////////////////////////////////////////
    /////////////////////// Funcion Borrar ////////////////////////
    ///////////////////////////////////////////////////////////////
    // Funcion borrar para borrar una fila en la tabla de base de datos
    // Parametros: La conexion a la base de datos    
    function borrar($conexion) {

        // Recogemos el codigo dni del formulario
        $borrar = $_POST['dni'];

        // Creamos una variable con la consulta delete para borrar la fila 
        $delete = "DELETE FROM cliente WHERE dni='$borrar'";

        // La ejecutamos en el servidor
        $conexion->exec($delete);

        // Refrescamos la pagina para actualizar la informacion.
        header("Refresh: 0");

    }

    ///////////////////////////////////////////////////////////////
    /////////////////////// Funcion Update ////////////////////////
    ///////////////////////////////////////////////////////////////
    // Funcion update para modificar una fila en la tabla de base de datos
    // Parametros: La conexion a la base de datos  
    function update($conexion) {

        // Recogemos los datos del formulario
        $dniActual = $_SESSION['dni']; // Este hace falta para buscar el registro en la BD


        // Si se ha introducido el dni
        if (isset($_POST["dni"]) && $_POST['dni'] != "") {

            // Guardamos el dni en una variable
            $dni['dni'] = $_POST["dni"];

            // Consulta para comprobar si el DNI existe
            $comprobacion = $conexion->query("SELECT dni FROM cliente WHERE dni='$dni'");

            // Si hay mas de 0 fila significa que hay un dni ya con ese numero
            if ($comprobacion->rowCount() > 0) {

                // Imprimimos el error de que el DNI ya existe
                echo '<div class="error">DNI ya existe<div>';

                // Volvemos a mandar los datos a $_POST para que la siguiente recarga aparezca
                // el formulario de modificar
                $_POST['modificar'] = "Modificar";
                $_POST['dni'] = $dniActual;

                // Return para salir de la funcion
                return;

            } else { // Si el dni no existe.
                
                // Guardamos el dni en sesion
                $_SESSION['dni'] = $dni;
            }
        }

        // Si se ha introducido el nombre
        if (isset($_POST['nombre']) && $_POST['nombre'] != "") {

            // Guardamos en sesion el nombre
            $_SESSION['nombre'] = $_POST['nombre'];
        }

        // Si se ha introducido la direccion
        if (isset($_POST['direccion']) && $_POST['direccion'] != "") {

            // Guardamos en sesion la direccion
            $_SESSION['direccion'] = $_POST['direccion'];
        }

        // Si se ha introducido el telefono
        if (isset($_POST['telefono']) && $_POST['telefono'] != "") {

            // Guardamos en sesion el telefono
            $_SESSION['telefono'] = $_POST['telefono'];
        } 
        
        // String $update con la sentencia SQL 
        $update = "UPDATE cliente SET ";
        $update .= "dni = '" . $_SESSION['dni']. "', ";
        $update .= "nombre = '" . $_SESSION['nombre']. "', ";
        $update .= "direccion = '" . $_SESSION['direccion'] . "', ";
        $update .= "telefono = '" . $_SESSION['telefono'] . "'";
        $update .= " WHERE dni='$dniActual'";
        
        // Ejecutamos la sentencia SQL
        $conexion->exec($update);

        // Refrescamos la pagina para actualizar la informacion.
        header("Refresh: 0");
    }
    ?>