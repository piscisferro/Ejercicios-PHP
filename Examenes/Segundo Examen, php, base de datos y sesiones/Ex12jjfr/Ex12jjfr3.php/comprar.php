<!DOCTYPE html>
<!--
Create By: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprar</title>
        
        <style>
            
            #catalogo {
                display: inline-block;
            }
            
            #carrito {
                display: inline-block;
                margin: 0 0 0 0;
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
    ?>
    
    <body>
        
        <h2>Finalizar Compra</h2>
        
        <?php
            try {
                // Conectamos a la base de datos
                $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos";
                die ("Error: " . $e->getMessage());
            }
            $sql = 'SELECT * FROM producto';
            
            $sqlEnvios = 'SELECT * FROM envios';
            
            $consultaEnvios = $conexion->query($sqlEnvios);
            
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
        <div id="total">Total = <?=$_SESSION['total']?>€</div>

        <form action="final.php" method="post">
            Destino: <select name="destino">
                <?php

                while ($registro = $consultaEnvios->fetchObject()) {

                    echo '<option value="'. $registro->codigo .'">'. $registro->codigo .' '. $registro->precio .'€</option>';
                }
                  ?>
            </select> 
            <input type="submit" name="final" value="Comprar">
        </form>
        
        
        <div id="carrito">
                <h2>Carrito</h2>
        <?php
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
                </div>
                <?php
            } //Fin del if
        } // Fin del while
        ?>
            
        </div>
    </body>
</html>
