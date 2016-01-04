<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle Pluma</title>
    </head>
    
        <?php 
    // Empezamos la session.
    session_start();
    
    // Inicializamos total
    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }
    
    // Inicializamos nuestro catalogo
    $catalogo = [["codigo" => "pluma1", "precio" => 2.00, "imagen" => "pluma1.jpg", "detalle" => "Detalle pluma1 pon aqui lo que quieras"], 
        ["codigo" => "pluma2", "precio" => 3.00, "imagen" => "pluma2.jpg", "detalle" => "Detalle pluma2 pon aqui lo que quieras"],
        ["codigo" => "pluma3", "precio" => 1.50, "imagen" => "pluma3.jpg", "detalle" => "Detalle pluma3 pon aqui lo que quieras"],
        ["codigo" => "pluma4", "precio" => 2.75, "imagen" => "pluma4.jpg", "detalle" => "Detalle pluma4 pon aqui lo que quieras"],
        ["codigo" => "pluma5", "precio" => 3.75, "imagen" => "pluma5.jpg", "detalle" => "Detalle pluma5 pon aqui lo que quieras"],
        ["codigo" => "pluma6", "precio" => 5.50, "imagen" => "pluma6.jpg", "detalle" => "Detalle pluma6 pon aqui lo que quieras"],
        ["codigo" => "pluma7", "precio" => 2.25, "imagen" => "pluma7.jpg", "detalle" => "Detalle pluma7 pon aqui lo que quieras"], 
    ];
    ?>
    
    <body>
        <div id="contenedor">
            <div id="producto">
                <?php 
                
                foreach ($catalogo as $producto) {
                    
                    if ($producto["codigo"] == $_POST["codigo"]) {
                    ?>
                    <img src="img/<?=$producto["imagen"]?>">
                    <p>Nombre: <?=$producto["codigo"]?></p>
                    <p>Precio: <?=$producto["precio"]?>€</p>
                    <p>Detalle: <?=$producto["detalle"]?></p>
                    
                    <!-- Formulario con el boton comprar -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="codigo" value="<?=$producto["codigo"]?>">
                        <input type="submit" name="submit" value="Comprar">
                    </form>
                    <a href="index.php"><button>Volver</button></a>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
