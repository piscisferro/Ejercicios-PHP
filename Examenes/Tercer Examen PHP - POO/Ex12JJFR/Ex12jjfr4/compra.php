<!DOCTYPE html>
<!--
Pagina donde chequeamos la compra

autor Juan Jose Fernandez Romero
-->
<?php 

session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ex12JFR4</title>
    </head>
    <body>
        <h4>¿Tiene Entrara Reservada?</h4>
        <form action="index.php" method="post">
            Nombre: <input type="text" name="nombre" required>
            <input type="hidden" name="zona" value="<?=$_POST["zona"]?>">
            <input type="submit" name="compraReservada" value="Si">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="zona" value="<?=$_POST["zona"]?>">
            <input type="submit" name="compra" value="No">
        </form>
    </body>
</html>

