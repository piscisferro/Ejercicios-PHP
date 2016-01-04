<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $euros = 13;
        $cambioDivisas = 166;
        $pesetas = $euros * $cambioDivisas;
        
        echo $euros, ' euros son ', $pesetas, ' pesetas';
        ?>
    </body>
</html>
