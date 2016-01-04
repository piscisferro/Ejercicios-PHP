<!DOCTYPE html>
<!--
Ejercicio 8
Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
Se pagarán 12 euros por hora.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <title>Ejercicio 4</title>
        <meta charset="UTF-8">
    </head>
    <body>
        
        <h3>Calcular Salario semanal de un trabajador</h3>
        <form action="index.php" method="post">
            Horas Trabajadas:
            <br><input type="number" name="horas"><br>
            Horas Extras: 
            <br><input type="number" name="horasExtras"><br>
            Euros por hora ordinaria: 
            <br><input type="number" name="pagaPorHora"><br>
            Euros por hora extra: 
            <br><input type="number" name="pagaPorExtra"><br>
            <br>
            <input type="submit" value="Calcular">
        </form>
        
        <?php
        
        echo "<br><br>";
        
        if (isset ($_POST['horas'], $_POST['horasExtras'], $_POST['pagaPorHora'], $_POST['pagaPorExtra'])) {
        
            $horas = $_POST['horas'];
            $horasExtras = $_POST['horasExtras'];
            $pagaPorHora = $_POST['pagaPorHora'];
            $pagaPorExtra = $_POST['pagaPorExtra'];

            $resultado = ($horas * $pagaPorHora) + ($pagaPorExtra * $horasExtras);

            echo "El salario total es: ", $resultado;
        }
        
        ?>
    </body>
</html>