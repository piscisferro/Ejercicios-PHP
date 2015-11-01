<!DOCTYPE html>
<!--
Ejercicio 12
Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
de conocimientos en las diferentes asignaturas del curso.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 12</title>
    </head>
    <body>
        
        <h3>Minicuestionario Daw 2</h3>
        
        <form action="index.php" method="post">
            <ol>
                <li>
                    ¿Que se da en DIW?<br>
                    <input type="radio" name="primera1" value="Interfaces">Interfaces<br>
                    <input type="radio" name="primera2" value="Arte">Arte<br>
                    <input type="radio" name="primera3" value="Historia Contemporanea">Historia Contemporanea<br><br>
                </li>
                <li>
                    ¿Como se concatenan elementos en un echo en PHP?<br>

                    <input type="radio" name="segunda1" value="con un +">con un +<br>
                    <input type="radio" name="segunda2" value="con una coma">con una coma<br>
                    <input type="radio" name="segunda3" value="No se puede concatenar">No se puede concatenar<br><br>
                </li>
                <li>
                    ¿De que entorno es JavaScript?<br>
                    <input type="radio" name="tercera1" value="Entorno cliente">Entorno cliente<br>
                    <input type="radio" name="tercera2" value="Entorno servidor">Entorno servidor<br>
                    <input type="radio" name="tercera3" value="Sin entorno">Sin entorno<br>
                </li>
            </ol>
            <input type="submit" name="submit" value="Puntuar!">
            
        </form>
        
        
        <?php
        
        $puntuacion = 0;
        
        if (isset($_POST['primera1'])) {
            $puntuacion++;      
        }
        
        if (isset($_POST['segunda2'])) {
            $puntuacion++;      
        }
        
        if (isset($_POST['tercera1'])) {
            $puntuacion++;      
        }
        
        if (isset($_POST['submit'])) {
            echo "<br>Tu puntuacion es ", $puntuacion, " de 3!";
        }
        
        
        
        ?>
    </body>
</html>
