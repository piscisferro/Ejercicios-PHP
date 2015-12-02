<!DOCTYPE html>
<!--
2. Realiza un programa que pida 10 números por teclado y que los almacene en un array. A continuación se debe
mostrar el contenido de ese array junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna y
en orden los pares y los impares: primero par, luego impar, luego par, luego impar… Cuando se acaben los pares o
los impares, se completará con los números que queden.
Ejemplo:
Array original:
0   1   2   3    4   5   6    7   8  9
20  5   7   4   37   9   2   17  11  6
Array resultante:
0   1   2   3   4    5   6   7   8   9
20  5   4   7   2   37   6   9  17  11


Alumno Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
        
        <style>
            
            td {
                
                width: 30px;
                padding-left: 10px;
                
            }
            
        </style>
        
    </head>
    <body>
        <h3>Ejerccio 2</h3>
        <p>Se piden 10 numeros despues de mostraran los 10 numeros ordenados, uno
        par, otro impar, uno par, otro impar... y finalizando con los numeros que queden</p>
        
        <form action="index.php" method="post">
            Numero: <input type="number" name="numero" placeholder="0" autofocus>
            <input type="submit" name="submit" id="enviar" value="Enviar">
            
            <?php 
            
            $contador = 0; // Variable para el contador de numeros
            $numeroTexto = ""; // Variable String para luego explotar en un array
            $numero2; // Array Auxiliar
            
            // Si hemos enviado el formulario
            if (isset($_POST['submit'])) {
                
                // Asignamos a la variable $numero el valor del campo
                $numero = $_POST['numero'];
                
                // Si el campo esta vacio lo sustituira por un 0
                if ($numero == "") {
                    $numero = 0;
                }
                
                // Asignamos a $contador su campo hidden
                $contador = $_POST['contador'];
                // Asignamos a $numeroTexto su campo hidden
                $numeroTexto = $_POST['numeroTexto']; 
                
                // Asignamos a $numeroTexto el numero introducido y un espacio
                $numeroTexto .= $numero;
                $numeroTexto .= " ";
                
                // Incrementamos contador
                $contador++;
            }
            
            echo '<input type="hidden" name="contador" value="', $contador, '">';
            echo '<input type="hidden" name="numeroTexto" value="', $numeroTexto, '">';
            ?>
        </form>
        
        <?php
        
        if ($contador == 10) {
            
            // Desactivar el boton submit  (cambiar enviar por la ID correspondiente)
            echo '<script>document.getElementById("enviar").disabled=true</script>';

            // Boton de recargar pagina
            echo '<br><button onclick ="document.location.href = document.location.href;">Recargar</button><br>';
            
            // Hacemos un substr para quitarle el espacio indeseado del final
            $numeroTexto = substr($numeroTexto, 0, -1);
            
            // Explotamos el string en un array
            $numero = explode(" ", $numeroTexto);
            $arrayLength = count($numero);
            
            $contadorPar = 0;
            $contadorImpar = 0;
            $pares;
            $impares;
            
            // Contamos el numero de pares e impares y los guardamos en arrays separados
            foreach ($numero as $i) {
                
                if ($i % 2 == 0) {
                    $contadorPar++;
                    $pares[] = $i;
                } else {
                    $contadorImpar++;
                    $impares[] = $i;
                }   
            }
                
                
            echo 'Array Original:<br>';
            
            ?>
        
        <table border="1">
            <tr>
        <?php
            // Indice
            for ($i = 0; $i < $arrayLength; $i++) {
                echo '<td>', $i, '</td>';
            }
            
            ?>
                
            </tr>
                
            <?php
            
            foreach ($numero as $i) {
                echo '<td>', $i, '</td>';
            }
            
            ?>
            </tr>
        </table>
        
        <?php
            
            // salto de linea
            echo '<br>';
            echo '<br>';
            
        ?>
        
        <table border="1">
            <tr>
            <?php
            echo 'Array Ordenado: <br>';
            // Indice
            for ($i = 0; $i < $arrayLength; $i++) {
                echo '<td>', $i, '</td>';
            }
            ?>
            </tr>
            
            <tr>
            <?php
            // Imprimimos los arrays par e impares;
            for ($i = 0; $i < $arrayLength; $i++) {
             
                if ($contadorPar > 0) {
                 
                    echo '<td>', $pares[$i], '</td>';
                    $contadorPar--;
                } 
                
                if ($contadorImpar > 0) {
                    
                    echo '<td>', $impares[$i], '</td>';
                    $contadorImpar--;
                    
                }   
            }   
        }
        ?>
            </tr>
        </table>
    </body>
</html>
