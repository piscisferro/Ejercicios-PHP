<!DOCTYPE html>
<!--
Ejercicio 20
Igual que el ejercicio anterior pero esta vez se debe pintar una pirámide hueca.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 20</title>
    </head>
    <body>
        <h3>Piramide Hueca</h3>
        
        <form action="index.php" method="post">
            Altura: <input type="number" name="altura" min="2" placeholder="min de 2">
            <input type="submit" name="submit" value="Pintar!">
        </form>
        
        <?php
        /*
            *       *       *          *
           ***     * *     * *        * *
                  *****   *   *      *   *
                         *******    *     *
                                   *********

        */
        
        // Si hemos puesto algo en el formulario
        if (isset($_POST['altura'])) {
            
            // Pintamos un par de saltos de linea
            echo '<br><br>';
            
            // Recogemos la altura
            $altura = $_POST['altura'];
            
            // Si nos fijamos bien en las piramides nos damos cuenta que su
            // anchura = (altura * 2) - 1
            $anchura = ($altura * 2) - 1;
            
            // Caracter con el cual pintaremos la piramide
            $caracter = "*";
            
            // Espacio entre caracteres
            $espacio = '&nbsp;&nbsp;'; // Si se usa espacio, HTML necesita 2 por caracter
                    
                    
            // Pintamos la piramide
            for($alturaPos = 0; $alturaPos <= $altura; $alturaPos++) {
                
                // Pintamos la primera linea
                if ($alturaPos == 0) {
                    
                    // Para la primera linea siempre se repite lo mismo
                    // es decir la cuspide siempre esta justo en medio, cosa
                    // que suele coincidir con la altura, es decir la cuspide
                    // se encuentra en la posicion de anchuraPos = altura
                    for ($anchuraPos = 1; $anchuraPos <= $altura; $anchuraPos++) {
                        
                        if ($anchuraPos == $altura) {
                            echo $caracter;
                        } else {
                            echo $espacio; // HTML necesita 2 espacios por caracter
                        }
                    }
                } // Fin de la primera Linea
                
                // Para pintar la ultima linea
                else if ($alturaPos == ($altura - 1)) {
                    
                    // Para la ultima linea siempre se cumple lo mismo
                    // Y es que toda la anchura esta pintada con asteriscos
                    for ($anchuraPos = 1; $anchuraPos <= $anchura; $anchuraPos++) {
                        
                        echo $caracter;
                        
                    }
                } // Fin de la ultima linea
                
                
                // Resto de lineas
                else {
                    
                    // Para el resto de las lineas siempre se repite lo mismo
                    // los caracteres se encuentran en la posicion altura - alturaPos
                    // y altura + alturaPos
                    
                    for ($anchuraPos = 1; $anchuraPos <= $anchura; $anchuraPos++) {
                        
                        if ($anchuraPos == ($altura - $alturaPos)) {
                            
                            echo $caracter;
                            
                        } else if ($anchuraPos == ($altura + $alturaPos)) {
                            
                            echo $caracter;
                            
                        } else {
                            echo $espacio;
                        }
                    }   
                }   
                // Salto de linea
                echo '<br>'; 
            } // Fin de bucle
            

             
            
            
        }
        
        ?>
    </body>
</html>
