<!DOCTYPE html>
<!--
Create By: Juan Jose Fernandez Romero
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
    
    ob_start();
    // Inicializamos total
    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }
    
    if (!isset($_SESSION['orden'])) {
    $_SESSION['orden'] = "nombre";
    }
    
    if (!isset($_SESSION['categoria'])) {
    $_SESSION['categoria'] = "todas";
    }
    ?>
    
    
    
    <body>
        
        <?php
            try {
                // Conectamos a la base de datos
                $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos";
                die ("Error: " . $e->getMessage());
            }
        
            ordena();
            muestra();
            
            $sql = 'SELECT * FROM producto ORDER BY '. $_SESSION["orden"];
            
            $consulta = $conexion->query($sql);
            
            while ($registro = $consulta->fetchObject()) {
                $producto[$registro->codigo] = array(
                "codigo" => $registro->codigo,
                "nombre" => $registro->nombre,
                "precio" => $registro->precio,
                "imagen" => $registro->imagen,
                "categoria" => $registro->categoria
                );
              }
              
              ?>
        
        <form action="ex12jjfr2.php" method="post">
            Ordenar por: <select name="ordena">
                <option value="nombre">Nombre</option>
                <option value="precio desc">Precio Mayor Primero</option>
                <option value="precio asc">Precio Menor Primero</option>
             </select> 
            <input type="submit" name="ordenar" value="Ordenar">
        </form>
        
        <form action="ex12jjfr2.php" method="post">
            Mostrar Categoria: <select name="categoria">
                <option value="todas">Todas</option>
                <option value="plumas">Plumas</option>
                <option value="premium">Premium</option>
             </select> 
            <input type="submit" name="muestra" value="Elegir">
        </form>
        
        <?php
            // Mostramos el catalogo
            echo '<div id="catalogo">';
            echo '<h2>Catalogo</h2>';
            
            if ($_SESSION['categoria'] == "todas") {
                // For each para mostrar todos los productos del catalogo
                foreach ($producto as $elemento) {
                    ?>
                        <!-- Producto en tienda -->
                    <div class="producto">
                        <img src="img/<?=$elemento["imagen"]?>">
                        <p>Nombre: <?=$elemento["nombre"]?></p>
                        <p>Precio: <?=$elemento["precio"]?>€</p>
                        <p>Categoria: <?=$elemento["categoria"]?></p>

                        <!-- Formulario con el boton comprar -->
                        <form action="ex12jjfr2.php" method="post">
                            <input type="hidden" name="codigo" value="<?=$elemento['codigo']?>">
                            <input type="submit" name="submit" value="Comprar">
                        </form>
                    </div>
                    <?php

                    // En cada iteraccion del foreach comprobamos si esta inicializado el producto del 
                    // catalogo, en caso de que no, lo ponemos a 0.
                    if (!isset($_SESSION['carrito'][$elemento['codigo']])) {
                        // dentro del foreach meteremos en un array en sesion cada producto y la cantidad = 0
                        $_SESSION['carrito'][$elemento['codigo']] = 0;
                    }

                } // Fin del while
            } else if ($_SESSION['categoria'] == "plumas") {
                
                foreach ($producto as $elemento) {
                    if ($elemento['categoria'] == "plumas") {
                
                ?>
                    <!-- Producto en tienda -->
                    <div class="producto">
                        <img src="img/<?=$elemento["imagen"]?>">
                        <p>Nombre: <?=$elemento["nombre"]?></p>
                        <p>Precio: <?=$elemento["precio"]?>€</p>
                        <p>Categoria: <?=$elemento["categoria"]?></p>

                        <!-- Formulario con el boton comprar -->
                        <form action="ex12jjfr2.php" method="post">
                            <input type="hidden" name="codigo" value="<?=$elemento['codigo']?>">
                            <input type="submit" name="submit" value="Comprar">
                        </form>
                    </div>
                    <?php
                    }
                }
            } else if ($_SESSION['categoria'] == "premium") {
                
                foreach ($producto as $elemento) {
                    if ($elemento['categoria'] == "premium") {
                
                ?>
                    <!-- Producto en tienda -->
                    <div class="producto">
                        <img src="img/<?=$elemento["imagen"]?>">
                        <p>Nombre: <?=$elemento["nombre"]?></p>
                        <p>Precio: <?=$elemento["precio"]?>€</p>
                        <p>Categoria: <?=$elemento["categoria"]?></p>

                        <!-- Formulario con el boton comprar -->
                        <form action="ex12jjfr2.php" method="post">
                            <input type="hidden" name="codigo" value="<?=$elemento['codigo']?>">
                            <input type="submit" name="submit" value="Comprar">
                        </form>
                    </div>
                    <?php
                    }
                }
            }
            
            
            // Si hemos apretado algun boton de comprar
            if (isset($_POST["codigo"])) {
                // Recogemos el codigo que se manda en su campo hidden e incrementamos
                // el valor asociado a ese codigo en el array
                $_SESSION["carrito"][$_POST["codigo"]]++;
                // Comparamos el codigo con todo lo introducido
                foreach ($producto as $elemento) {
                    // Si el codigo es igual a algo del catalogo
                    if ($elemento['codigo'] == $_POST['codigo']) {
                        // sumamos el precio al total
                        $_SESSION['total']+= $elemento["precio"];
                    }
                }
            }
            
            // Si hemos apretado algun boton de borrar
            if (isset($_POST["borrar"])) {
                // Recogemos el codigo de su campo hidden y decrementamos
                // el valor asociado a ese codigo en el array
                $_SESSION["carrito"][$_POST["borrar"]]--;
                
                // Comparamos el codigo con todo lo introducido
                foreach ($producto as $elemento) {
                    // Si el codigo es igual a algo del carrito
                    if ($elemento['codigo'] == $_POST['borrar']) {
                        // Restamos el precio al total
                        $_SESSION['total']-= $elemento["precio"];
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
                
                if (isset($_POST["borrarcarrito"])) {
                    
                    foreach ($producto as $elemento) {
                        if ($_SESSION["carrito"][$elemento['codigo']] > 0) {
                            $_SESSION["carrito"][$elemento['codigo']] = 0;
                        }
                    }
                    
                    $_SESSION["total"] = 0;
                    header("refresh: 0");
                }
                
                // For each para mostrar el carrito, explicacion: Este foreach recorre
                // el array del catalogo (como el de la tienda)
                foreach ($producto as $elemento) {
                    // Si el codigo del $producto actual en el array sesiones (el que inicializamos
                    // en el foreach de la tienda) es mayor a 0 pintamos el HTML
                    if ($_SESSION["carrito"][$elemento['codigo']] > 0) {
                        
                        ?> 
                <!-- Producto en carrito -->
                <div class="producto">
                    <img src="img/<?=$elemento["imagen"]?>">
                    <p>Nombre: <?=$elemento["codigo"]?></p>
                    <p>Cantidad: <?=$_SESSION["carrito"][$elemento["codigo"]]?></p>
                    <p>Precio: <?=$elemento["precio"] * $_SESSION["carrito"][$elemento["codigo"]]?>€</p>
                    
                    
                    <!-- Formulario para el boton borrar -->
                    <form action="ex12jjfr2.php" method="post">
                        <input type="hidden" name="borrar" value="<?=$elemento["codigo"]?>">
                        <input type="submit" name="submit" value="Borrar">
                    </form>
                </div>
                
                
                        <?php
                    } //Fin del if
                } // Fin del while
                
                ob_flush();
                
                ?> 
                
                <form action="ex12jjfr2.php" method="post">
                    <input type="submit" name="borrarcarrito" value="Borrar todo">
                </form>
                
                <?php
                
                function ordena() {
                    if (isset($_POST['ordenar'])) {
                        $_SESSION['orden'] = $_POST['ordena'];
                    }
                }
                
                
                function muestra() {
                    
                    if (isset($_POST['muestra'])) {
                        $_SESSION['categoria'] = $_POST["categoria"];
                        
                    }
                    
                }
                ?> 
            </div>
    </body>
</html>
