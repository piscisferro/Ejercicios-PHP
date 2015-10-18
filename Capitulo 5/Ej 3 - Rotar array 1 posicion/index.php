<!DOCTYPE html>
<!--
Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los
elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
muestra el contenido del array.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rotar Array</title>
        
        <style>
            td {
                padding: 5px;
                width: 50px;
                height: 25px;
            }
            
            td:nth-child(even) {
                background-color: beige;
            }
            
            td:nth-child(odd) {
                background-color: lightgrey;
            }
        </style>
        
    </head>
    <body>
        <h3>Rotar Array 1 posicion</h3>
        <p>Introduce 15 numeros para el array</p>
        
        <form action="index.php" method="post">
            <input type="number" name="numero" placeholder="0" autofocus checked>
            <input type="submit" id="enviar" name="submit" value="¡Enviar!">
            
        <?php
        
        $numero; // Variable para numero input
        $contador = 0; // Variable para contador
        $numeroTexto = ""; // Variable auxiliar para luego explotar en un array
        
        // Si se envia el formulario
        if (isset($_POST['numero'])) {
            
            // Asignamos el valor a la variable numero
            $numero = $_POST['numero'];
            
            // En el caso de que envien el formulario vacio lo tomamos como 0
            if ($numero == "") {
                $numero = 0;
            }
            
            // Asignamos a $numeroTexto el input hidden en el caso que lo haya
            if (isset($_POST['numeroTexto'])) {
                $numeroTexto = $_POST['numeroTexto'];
            }
            // Añadimoa a numeroTexto el numero y un espacio
            $numeroTexto .= $numero;
            $numeroTexto .= " ";
            
            // Asignamos a contador el input hidden si lo hay
            if (isset($_POST['contador'])) {
                $contador = $_POST['contador'];
            }
            // Incrementamos la variable contador
            $contador++;
            
            // Enviamos los datos como hidden
            echo '<input type="hidden" name="numeroTexto" value="', $numeroTexto ,'">';
            echo '<input type="hidden" name="contador" value="', $contador ,'">'; 
        }
        ?> 
        </form>
        
        <?php
        // Salimos del formulario
        // Si contador llega a los 15 numeros
        if ($contador == 15) {
            
            // Desactivamos el boton submit
            echo '<script>document.getElementById("enviar").disabled=true</script>';
            // Añadimos el boton recargar con JavaScript
            echo '<button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
            
            // El substr funciona asi substr(string, start, length) String es el 
            // String que pasamos, start es donde empieza dicho string (siendo 0 el primer
            // caracter) length es donde termina (siendo 0 el ultimo caracter) Lo que
            // esencialmente hacemos con substr aqui es quitarle un espacio que queda
            // al final de $numeroTexto asi substr devuelve un string desde el principio
            // hasta el final menos 1 (es decir quita el ultimo espacio que es indeseado)
            $numeroTexto = substr($numeroTexto, 0, -1);
            
            // Explotamos el String para pasarlo a Array
            $numero = explode(" ", $numeroTexto);
            
            // Metemos en una variable la longitud del array
            $arrayLength = count($numero);      
            
        ?>
        
        <table border="1">
            <tr>
        
                <?php
                    // Pintamos el Array "Virgen"
                    for ($i = 0; $i < $arrayLength; $i++) {
                        echo '<td>', $numero[$i],'</td>';
                    }
                ?>
                
            </tr>
            <tr>
                <?php
                    // Organizamos el Array moviendo posiciones
                    for ($i = 0; $i  < $arrayLength; $i++) {
                        // Para la primera posicion 
                        if ($i == 0) {
                            // Guardamos el numero en una variable auxiliar
                            $aux = $numero[$i];
                            // Asignamos a la primera posicion el ultimo numero del array
                            $numero[$i] = $numero[$arrayLength - 1];
                            // Lo imprimimos en HTML
                            echo'<td>', $numero[$i],'</td>';
                        } 
                        // Para el resto de posiciones
                        else {
                            // Guardamos el numero de la posicion en una segunda variable aux2
                            $aux2 = $numero[$i];
                            // Asignamos a la posicion el numero(anterior) de la variable aux
                            $numero[$i] = $aux;
                            // Le damos a aux el valor qu guardamos antes en aux2 
                            // (es decir el valor de la posicion actual
                            $aux = $aux2;
                            // Lo imprimimos en HTML
                            echo'<td>', $numero[$i],'</td>';
                        } 
                    }
                } // Fin if ($contador == 15)

                ?>
            </tr>
        </table>
        
    </body>
</html>
