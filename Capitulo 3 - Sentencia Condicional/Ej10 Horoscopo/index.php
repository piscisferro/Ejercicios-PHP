<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h3>Horoscopo</h3>
        <form action="index.php" method="post">
            Introduce el dia de tu nacimiento:
            <br><input type="number" name="dia" min="1" max="31" placeholder="1"><br>
            Introduce el mes:
            <br><select name="mes">
                <option value="Enero" selected="selected">Enero</option>
                <option value="Enero">Febrero</option>
                <option value="Enero">Marzo</option>
                <option value="Enero">Abril</option>
                <option value="Enero">Mayo</option>
                <option value="Enero">Junio</option>
                <option value="Enero">Julio</option>
                <option value="Enero">Agosto</option>
                <option value="Enero">Septiembre</option>
                <option value="Enero">Octubre</option>
                <option value="Enero">Noviembre</option>
                <option value="Enero">Diciembre</option>
            </select><br><br>
            <input type="submit" value="Calcular">
        </form>
        
        <?php
        
        if (isset($_POST['dia'])) {
            
            $dia = $_POST['dia'];
            $mes = $_POST['mes'];
            
            echo "<br><br>";
            
            switch ($mes) {
                
                case "Enero":
                    if ($dia <= 19) {
                        echo "Eres Capricornio";                    
                    } else {
                        echo "Eres Acuario";
                    } 
                    break;
                    
                case "Febrero": 
                    if ($dia <= 17) {
                        echo "Eres Acuario";
                    } else {
                        echo "Eres Piscis";
                    }
                    break;
                
                case "Marzo":
                    if ($dia <= 19) {
                        echo "Eres Piscis";
                    } else {
                        echo "Eres Aries";
                    }
                    break;
                
                case "Abril":
                    if ($dia <= 19) {
                        echo "Eres Aries";
                    } else {
                        echo "Eres Tauro";
                    }
                    break;
                
                case "Mayo":
                    if ($dia <= 20) {
                        echo "Eres Tauro";
                    } else {
                        echo "Eres Geminis";
                    }
                    break;
                
                case "Junio":
                    if ($dia <= 20) {
                        echo "Eres Geminis";
                    } else {
                        echo "Eres Cancer";
                    }
                    break;
                
                case "Julio":
                    if ($dia <= 22) {
                        echo "Eres Cancer";
                    } else {
                        echo "Eres Leo";
                    }
                    break;
                
                case "Agosto":
                    if ($dia <= 22) {
                        echo "Eres Leo";
                    } else {
                        echo "Eres Virgo";
                    }
                    break;
                
                case "Septiembre":
                    if ($dia <= 22) {
                        echo "Eres Virgo";
                    } else {
                        echo "Eres Libra";
                    }
                    break;
                
                case "Octubre":
                    if ($dia <= 22) {
                        echo "Eres Libra";
                    } else {
                        echo "Eres Escorpio";
                    }
                    break;
                
                case "Noviembre":
                    if ($dia <= 21) {
                        echo "Eres Escorpio";
                    } else {
                        echo "Eres Sagitario";
                    }
                    break;
                
                case "Diciembre":
                    if ($dia <= 21) {
                        echo "Eres Sagitario";
                    } else {
                        echo "Eres Capricornio";
                    }
                    break;
            }
        }
        ?>
    </body>
</html>
