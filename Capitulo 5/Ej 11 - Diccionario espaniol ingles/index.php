<!DOCTYPE html>
<!--
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Diccionario Español-Ingles</title>
    </head>
    <body>
        <h3>Diciconario Español-Ingles</h3>
        <p>Introduce una palabra en español para ver su significado en ingles</p>
        <form action="index.php" method="post">
            Introduce la palabra: <input type="text" name="palabra" autofocus>
            <input type="submit" name="submit" value="Enviar">
        </form>
        
        <?php
        // Array Asociativo con las palabras
        $diccionario = ["coche" => "car", "pescado" => "fish", "cama" => "bed", "mesa" => "table", "silla" => "chair",
                        "cerveza" => "beer", "casa" => "house", "gato" => "cat", "perro" => "dog", "bailar" => "dance"];
        
        // Si hemos enviado el formulario
        if(isset($_POST['palabra'])) {
            
            // Asignamos el valor del campo a la variable
            $palabra = $_POST['palabra'];
            
            // array_key_exists es una funcion que nos dice si se encuentra o no la 
            // clave en un array asociativo (recordar que la clave es la que lo define
            // y el valor es la palabra asociada a la clave) clave -> coche valor -> car
            if (array_key_exists($palabra, $diccionario)) {
                // Pintamos en HTML
                echo '<br>La palabra ', $palabra, ' significa ', $diccionario[$palabra];
                
            } 
            // Si no existe la palabra.
            else {
                // Pintamos en HTML
                echo '<br>Lo sentimos, esa palabra no esta en el diccionario';
            }
        }
        
        ?>
    </body>
</html>
