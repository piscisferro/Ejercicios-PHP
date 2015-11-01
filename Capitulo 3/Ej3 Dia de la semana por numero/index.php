<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día
de la semana.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        
        <h3>Di un numero y te dire un dia</h3>
        
        <form action="index.php" method="post">
            
            Numero: &nbsp;&nbsp; <input type="number" min="0" max="7" maxlength="1" name="numero">
            <input type="submit" value="Confirmar">
            
        </form>
        
        <?php
        
        if (isset($_POST['numero'])) {
            
            $numero = $_POST['numero'];
            echo "<br>";
            
            switch ($numero) {
                
                case 1:
                    echo "Lunes";
                    break;
                case 2:
                    echo "Martes";
                    break;
                case 3:
                    echo "Miercoles";
                    break;
                case 4:
                    echo "Jueves";
                    break;
                case 5:
                    echo "Viernes";
                    break;
                case 6:
                    echo "Sabado";
                    break;
                case 7:
                    echo "Domingo";
                    break;
                default:
                    echo "Revisate el numero";
            }
        }
        ?>
    </body>
</html>
