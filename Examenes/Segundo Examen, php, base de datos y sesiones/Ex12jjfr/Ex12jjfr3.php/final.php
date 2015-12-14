<!DOCTYPE html>
<!--
Create By: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Compra finalizada</title>
    </head>
    <body>
        <?php
        // Empezamos la session.
        session_start();
        
        
        try {
            // Conectamos a la base de datos
            $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos";
            die ("Error: " . $e->getMessage());
        }

        $sqlEnvios = 'SELECT * FROM envios';

        $consultaEnvios = $conexion->query($sqlEnvios);
        
        while ($registro = $consultaEnvios->fetchObject()) {
            if ($_POST['destino'] == $registro->codigo) {
                $precio = $registro->precio;
            }
        }
        
        ?>
        <p>La Compra ha sido finalizada</p>
        <p>Precio Total Pedido: <?=$_SESSION['total']?>€</p>
        <p>
        <?php
        
        if ($_SESSION['total'] >= 100) {
            
            $precio = 0;
            echo $precio . '€ de gastos de envio por comprar superior a 100€';
            
        } else {
            
            echo $precio . '€ de Gastos de envio';
            
        }
        ?> 
        </p>
        
        <p>
            Precio Final: <?=$_SESSION['total'] + $precio?>€
        </p>
    </body>
</html>
