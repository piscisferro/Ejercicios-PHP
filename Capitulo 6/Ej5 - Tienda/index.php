<!DOCTYPE html>
<!--
Ejercicio 5
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda</title>
        
        <style>
            
            #catalogo {
                display: inline-block;
            }
            
            #carrito {
                display: inline-block;
                margin: 0 0 0 150px;
                position: absolute;
            }
            
            .producto {
                border: 1px solid black;
                width: 350px;
                margin: 25px 0;
            }
            
            img {
                width: 300px;
            }
            
            
        </style>
        
    </head>
    
    <?php 
    // Empezamos la session.
    session_start();
    
    // Usuario y contraseña
    $usuario = "usuario";
    $password = "usuario";
    
    // Inicializamos el logueo
    if (!isset($_SESSION['logueado'])) {
        $_SESSION['logueado'] = false;
    }
    
    // Inicializamos total
    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }
    
    // Inicializamos nuestro catalogo
    $catalogo = [["codigo" => "pluma1", "precio" => 2.00, "imagen" => "pluma1.jpg"], 
        ["codigo" => "pluma2", "precio" => 3.00, "imagen" => "pluma2.jpg"],
        ["codigo" => "pluma3", "precio" => 1.50, "imagen" => "pluma3.jpg"],
        ["codigo" => "pluma4", "precio" => 2.75, "imagen" => "pluma4.jpg"],
        ["codigo" => "pluma5", "precio" => 3.75, "imagen" => "pluma5.jpg"],
        ["codigo" => "pluma6", "precio" => 5.50, "imagen" => "pluma6.jpg"],
        ["codigo" => "pluma7", "precio" => 2.25, "imagen" => "pluma7.jpg"], 
    ];
    ?>
    
    
    
    <body>
        <?php
        // Si no estamos logueado aparecera la pantalla de logueo
         // Si no se esta logueado saldra el formulario para loguearse
        if ($_SESSION['logueado'] == false) {
            // Si es la primera vez que entramos
            if (!isset($_POST['submit'])) {
                
                // Craeamos el formulario para loguear
                ?>
                <p>Introduzca Usuario y contraseña</p>
                <form action="index.php" method="post">
                    Usuario: <input type="text" name="usuario" placeholder="usuario" autofocus><br>
                    Contraseña: <input type="password" name="password"><br>
                    <input type="submit" name="submit" value="logging">
                </form>
        <?php
            } else { // Si ya hemos mandado el formulario
                // Comprobamos si se ha introducido el usuario y contraseña correctamente
                if ($_POST['usuario'] == $usuario && $_POST['password'] == $password) {
                    
                    // Nos logueamos y lo ponemos a true
                    $_SESSION['logueado'] = true;
                    // Refrescamos la pagina
                    header("refresh: 0;");
                    
                } else { // Si introducimos los datos mal
                    // Volvemos a crear el formulario per advirtiendo de que lo hemos hecho mal
                    ?>
                    <p>Error, usuario o contraseña incorrectos.</p>
                    <form action="index.php" method="post">
                        Usuario: <input type="text" name="usuario" placeholder="usuario" autofocus><br>
                        Contraseña: <input type="password" name="password"><br>
                        <input type="submit" name="submit" value="logging">
                    </form>
                    <?php
                } 
            } // Fin de comprobacion de formulario
        } // Fin fase logueo
        
        // Si estamos logueados
        else {
            // Mostramos el catalogo
            echo '<div id="catalogo">';
            echo '<h2>Catalogo</h2>';
            
            // For each para mostrar todos los productos del catalogo
            foreach ($catalogo as $producto) {
                ?>
                    <!-- Producto en tienda -->
                <div class="producto">
                    <img src="img/<?=$producto["imagen"]?>">
                    <p>Nombre: <?=$producto["codigo"]?></p>
                    <p>Precio: <?=$producto["precio"]?>€</p>
                    
                    <!-- Formulario con el boton comprar -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="codigo" value="<?=$producto["codigo"]?>">
                        <input type="submit" name="submit" value="Comprar">
                    </form>
                    <!-- Formulario boton detalle -->
                    <form action="detalle.php" method="post">
                        <input type="hidden" name="codigo" value="<?=$producto["codigo"]?>">
                        <input type="submit" name="submit" value="Detalle">
                    </form>  
                </div>
                <?php
                
                // En cada iteracciond el foreach comprobamos si esta inicializado el producto del 
                // catalogo, en caso de que no, lo ponemos a 0.
                if (!isset($_SESSION["carrito"][$producto["codigo"]])) {
                    // dentro del foreach meteremos en un array en sesion cada producto y la cantidad = 0
                    $_SESSION["carrito"][$producto["codigo"]] = 0;
                }
            } // Fin del foreach
            
            
            // Si hemos apretado algun boton de comprar
            if (isset($_POST["codigo"])) {
                // Recogemos el codigo que se manda en su campo hidden e incrementamos
                // el valor asociado a ese codigo en el array
                $_SESSION["carrito"][$_POST["codigo"]]++;
                
                // Comparamos el codigo con todo lo introducido
                foreach ($catalogo as $producto) {
                    // Si el codigo es igual a algo del catalogo
                    if ($producto['codigo'] == $_POST['codigo']) {
                        // Restamos el precio al total
                        $_SESSION['total']+= $producto['precio'];
                    }
                }
            }
            
            // Si hemos apretado algun boton de borrar
            if (isset($_POST["borrar"])) {
                // Recogemos el codigo de su campo hidden y decrementamos
                // el valor asociado a ese codigo en el array
                $_SESSION["carrito"][$_POST["borrar"]]--;
                
                // Comparamos el codigo con todo lo introducido
                foreach ($catalogo as $producto) {
                    // Si el codigo es igual a algo del catalogo
                    if ($producto['codigo'] == $_POST['borrar']) {
                        // Restamos el precio al total
                        $_SESSION['total']-= $producto['precio'];
                    }
                }
            }
            
            echo '</div>';
            ?>
            <!-- Parte de Carrito -->
            <div id="carrito">
                <h2>Carrito</h2>
                <div id="total">Total = <?=$_SESSION['total']?>€</div>
                <?php
                
                // For each para mostrar el carrito, explicacion: Este foreach recorre
                // el array del catalogo (como el de la tienda)
                foreach ($catalogo as $producto) {
                    // Si el codigo del $producto actual en el array sesiones (el que inicializamos
                    // en el foreach de la tienda) es mayor a 0 pintamos el HTML
                    if ($_SESSION["carrito"][$producto["codigo"]] > 0) {
                        
                        ?> 
                <!-- Producto en carrito -->
                <div class="producto">
                    <img src="img/<?=$producto["imagen"]?>">
                    <p>Nombre: <?=$producto["codigo"]?></p>
                    <p>Cantidad: <?=$_SESSION["carrito"][$producto["codigo"]]?></p>
                    <p>Precio: <?=$producto["precio"] * $_SESSION["carrito"][$producto["codigo"]]?>€</p>
                    
                    
                    <!-- Formulario para el boton borrar -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="borrar" value="<?=$producto["codigo"]?>">
                        <input type="submit" name="submit" value="Borrar">
                    </form>
                </div>
                        <?php
                    } //Fin del if
                } // Fin del Foreach
                ?> 
            </div>
            <?php
        } // Fin de la web/tienda
        ?>
    </body>
</html>
