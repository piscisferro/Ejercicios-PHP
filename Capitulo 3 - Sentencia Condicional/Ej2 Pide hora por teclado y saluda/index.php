<!DOCTYPE html>
<!--
Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        
        <h3>¿Que hora es?</h3>
        
        <form action="index.php" method="post">
            
            ¿Que hora es? &nbsp;&nbsp;<input type="number" name="hora" min="0" placeholder="8" maxlength="2">
            <input type="submit" value="confirmar">
            
        </form>
        
        <?php
        
        if (isset($_POST['hora'])) {
            
            echo "<br><br>";
            $hora = $_POST['hora'];
            
            if ($hora >= 21) {
             
                echo "Buenas noches";
                
            } else if ($hora >= 6 && $hora <= 12) {
                
                echo "Buenos dias";
                
            } else if ($hora >= 13 && $hora <= 20) {
                
                echo "Buenos tardes";
                
            } else if ($hora <= 5) {
                
                echo "Buenas noches";
                
            }
        }
        ?>
    </body>
</html>