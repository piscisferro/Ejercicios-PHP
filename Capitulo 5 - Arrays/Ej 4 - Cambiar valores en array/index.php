<!DOCTYPE html>
<!--
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cambiar valores en array</title>
    </head>
    <body>
        <h3>Cambiar valores en array</h3>
        <h4>Introduce dos numeros, se cambiaran los numeros del primer campo por los del segundo</h4>
        
        <?php
        
        $numero;
        $numeroTexto = "";
        
        // Generamos el array
        for ($i = 0; $i < 100; $i++) {
            
            // Llenamos la posicion con numero random entre 0 y 20
            $numero[$i] = rand(0, 20);
            // Lo metemos en una variable string
            $numeroTexto .= $numero[$i];
            $numeroTexto .= " ";
        }
        ?>
        
        <form action="index.php" method="post">
            Introduce un numero:  <input type="number" name="primerCampo" placeholder="0" autofocus><br>
            Introduce otro numero:  <input type="number" name="segundoCampo" placeholder="0"><br>
            <input type="submit" name="submit" id="enviar" value="¡Enviar!">
            
            <?php
            // Mandamos el array por hidden
            echo '<p><input type="hidden" name="numeroTexto" value="', $numeroTexto,'"></p>';
            ?>
        </form>
        
        <?php
        
        // Si se ha mandado el formulario
        if (isset($_POST['numeroTexto'])) {
            
            // Recogemos la primer campo
            $primeraOcurrencia = $_POST['primerCampo'];
            // Recogemos el segundo campo
            $segundaOcurrencia = $_POST['segundoCampo'];
            
            // Asignamos el array anterior de nuevo a su variable String
            $numeroTexto = $_POST['numeroTexto'];
            
            // Hacemos un Substr para librarnos del ultimo espacio indeseado
            $numeroTexto = substr($numeroTexto, 0, -1);
            
            // Explotamos el string lo pasamos a Array
            $numero = explode(" ", $numeroTexto);
            // Metemos en una variable la longitud del Array
            $arrayLength = count($numero);
            
            // Cambiamos los numeros del primer campo por los numeros del segundo
            for ($i = 0; $i < $arrayLength; $i++) {
                
                // Si el numero en la posicion es igual al primer campo lo cambiamos
                if ($numero[$i] == $primeraOcurrencia) 
                    $numero[$i] = $segundaOcurrencia;
                
                // Imprimimos el numero y un espacio en HTML
                echo $numero[$i], ' ';
            }
            
        } 
        
        // La primera vez que entramos a la web
        else {
            // Imprimimos el String con el array en HTML
            echo $numeroTexto;
        }
        ?>
        
        
    </body>
</html>
