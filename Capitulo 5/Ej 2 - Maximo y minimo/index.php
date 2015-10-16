<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Maximo y Minimo</title>
    </head>
    <body>
        <h3>Maximo y Minimo</h3>
        <p>Introduce 10 numeros y mostrara el maximo y el minimo</p>
        
        <form action="index.php" method="post">
            <input type="number" name="numero" placeholder="0" autofocus>
            <input type="submit" id="submit" name="submit" value="¡Enviar!">
            
            <?php
            
            $numero; // Variable numero
            $contador; // Contador de numeros
            $numeroTexto = ""; // Variable auxiliar para luego explotar el String y convertirlo a Array
            
            if (isset($_POST['numero'])) {
                
                // La primera vez que se envia el formulario
                // Recogemos los datos
                $numero = $_POST['numero'];
                
                if (isset($_POST['numeroTexto'])) {
                    $numeroTexto = $_POST['numeroTexto'];
                }
                // Añadimos el numero al String para luego explotarlo
                $numeroTexto .= $numero;
                $numeroTexto .= " ";
                
                // Recogemos el valor del contador 
                if (isset($_POST['contador'])) {
                    $contador = $_POST['contador'];
                } else { 
                    // En el caso de que no haya informacion del contador, lo ponemos a 0
                    $contador = 0;
                }
                // Sumamos 1 al contador
                $contador++;
                
                // Enviamos los datos como hidden
                echo '<input type="hidden" name="numeroTexto" value="', $numeroTexto ,'">';
                echo '<input type="hidden" name="contador" value="', $contador ,'">';
                
            } else {
                // Ponemos un else por si acaso el usuario envia un formulario vacio
                // Asi no perderemos los datos
                
                // Recogemos el String auxiliar para no perder los numeros introducidos
                // hasta ahora
                if (isset($_POST['numeroTexto'])) {
                    $numeroTexto = $_POST['numeroTexto'];
                    echo '<input type="hidden" name="$numeroTexto" value="', $numeroTexto ,'">';
                }
                
                // Recogemos el valor del contador
                if (isset($_POST['contador'])) {
                    $contador = $_POST['contador'];
                } else {
                    $contador = 0;
                }
                
                // Volvemos a enviar los datos
                echo '<input type="hidden" name="$contador" value="', $contador ,'">';
            }
            
            ?>
        </form>
        
            <?php
            if ($contador >= 10) {
                $numero = explode(" ", $numeroTexto);
                
                $arrayLength = count($numero);
                
                for ($i = 0) {
                    echo $i, "<br>";
                }
                
            }
                
            ?>
            
        
    </body>
</html>
