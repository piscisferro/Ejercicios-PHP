<!DOCTYPE html>
<!--
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pares e Impares</title>
        
        <style>
            
            span {
                
                display: inline-block;
                margin: 0 10px;
                
            }
            
            .pares {
                
                color: red;
                
            }
            
            .impares {
                
                color: blue;
                
            }
            
        </style>
        
    </head>
    <body>
        <h3>Pares e Impares</h3>
        <p>Introduce 8 numeros</p>
        
        <form action="index.php" method="post">
            <input type="number" name="numero" placeholder="0" autofocus>
            <input type="submit" name="submit" id="enviar" value="¡Enviar!">
            
            <?php
            
            $numeroTexto = ""; // Variable auxiliar para luego explotar en un array
            $numero; // Variable para numero
            $contador = 0; // Variable para contador
            
            // Si hemos mandado el formulario
            if (isset($_POST['submit'])) {
                
                // Asignamos el campo numero a la variable $numero
                $numero = $_POST['numero'];
                
                // Si el campo esta vacio asignamos 0
                if ($numero == "") {
                    $numero = 0;
                }
                
                // Asignamos el campo numeroTexto a la variable $numeroTexto
                if (isset($_POST['numeroTexto'])) {
                    $numeroTexto = $_POST['numeroTexto'];
                }
                
                // Le sumamos al string el numero y un espacio
                $numeroTexto .= $numero;
                $numeroTexto .= " ";
                
                // Asignamos el campo contador a la variable $contador
                if (isset($_POST['contador'])) {
                    $contador = $_POST['contador'];
                }
                
                // Incrementamos la variable $contador
                $contador++;
                
                // Imprimimos los campos hidden con $numeroTexto y $contador
                echo '<input type="hidden" name="numeroTexto" value="', $numeroTexto ,'">';
                echo '<input type="hidden" name="contador" value="', $contador ,'">';
            } // Fin if
            
            ?>
            
        </form>
        
        <?php
        
        // Si $contador llega a 8 (se han introducido 8 numeros)
        if ($contador == 8) {
            
            // Desactivamos el boton submit
            echo '<script>document.getElementById("enviar").disabled=true</script>';
            // Añadimos el boton recargar con JavaScript
            echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
            
            // Eliminamos el espacio indeseado del final del string
            $numeroTexto = substr($numeroTexto, 0, -1);
            
            // Explotamos el string en un array
            $numero = explode(" ", $numeroTexto);
            
            // Guardamos en una variable la longitud del Array
            $arrayLength = count($numero);
            
            // Este bucle pinta pares e impares con sus respectivos Span para el color
            for ($i = 0; $i < $arrayLength; $i++) {
                // Si el numero es par o es 0
                if (($numero[$i] % 2) == 0 || $numero[$i] == 0) {
                    echo '<span class="pares">', $numero[$i] ,'</span>';
                } 
                
                // Si el numero es impar
                else if (($numero[$i] % 2 != 0)) {
                    echo '<span class="impares">', $numero[$i], '</span>';
                }
            }  
        }
        ?>
    </body>
</html>
