<!DOCTYPE html>
<!--
Realiza un conversor de euros a pesetas. La cantidad en euros que se quiere convertir deberá estar
almacenada en una variable.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $pesetas = 900;
        $cambioDivisas = 0.006;
        $euros = $pesetas * $cambioDivisas;
        
        echo $pesetas, ' pesetas son ', $euros, ' euros';
        ?>
    </body>
</html>
