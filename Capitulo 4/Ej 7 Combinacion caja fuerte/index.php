<!DOCTYPE html>
<!--
Ejercicio 7
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.

Creado por Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>
        
        <h3>Introduzca la combinacion</h3>
        
        <?php 
        
        // Numero combinacion
        $combinacionDigito1 = 1; 
        $combinacionDigito2 = 2;
        $combinacionDigito3 = 3;
        $combinacionDigito4 = 4;
        
        
        
        // Oportunidades y la primera vez que entramos a la web        
        if (!isset($_POST['submit'])) {
        
            $oportunidades = 5;
            
            // Imprimir Formulario
            echo '<form action="index.php" method="post">';
            echo '<input type="text" name="digito1" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito2" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito3" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito4" size="1" maxlength = "1" placeholder="-">';
            
            // Hidden con las oportunidades
            echo '<input type="hidden" name="oportunidades" value="', $oportunidades , '">';
            
            // Boton submit
            echo '<br><input type="submit" name="submit">';
            echo '</form>';
        
        } //////////////////////////////////////// Fin
        
        
        /////////////
        // Obtencion de numeros y variables del input
        ////////////
        $digito1 = (isset($_POST['digito1']))? $_POST['digito1']:"";
        $digito2 = (isset($_POST['digito2']))? $_POST['digito2']:"";
        $digito3 = (isset($_POST['digito3']))? $_POST['digito3']:"";
        $digito4 = (isset($_POST['digito4']))? $_POST['digito4']:"";
        $correcto = (isset ($_POST['correcto']))? $_POST['correcto']:"";
        $oportunidades = (isset ($_POST['oportunidades']))? $_POST['oportunidades']:"";
        
        
        // Comparacion para determinar si el numero introducido es correcto
        if ($digito1 == $combinacionDigito1 && $digito2 == $combinacionDigito2 && $digito3 == $combinacionDigito3 && $digito4 == $combinacionDigito4) {

            $correcto = 1;
        } else {
            $correcto = 0;
        }
        
        // Si ya hemos dado al boton submit 
        if (isset($_POST['submit'])) {
            
            // Si nos quedan oportunidades y no es el numero correcto
            if ($oportunidades > 1 && $correcto == 0) {
            
                // Imprime Formulario de nuevo
                echo '<form action="index.php" method="post">';
                echo '<input type="text" name="digito1" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito2" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito3" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito4" size="1" maxlength = "1" placeholder="-">';

                // Comprobamos si el numero introducido es o no el de la combinacion
                if ($digito1 == $combinacionDigito1 && $digito2 == $combinacionDigito2 && $digito3 == $combinacionDigito3 && $digito4 == $combinacionDigito4) {
                    // Si es, lo guardamos en un hidden
                    echo '<input type="hidden" name="correcto" value="1">';

                } else {
                    // Si no es lo guardamos tambien en un hidden
                    echo '<input type="hidden" name="correcto" value="0">'; 
                }

                // Restamos 1 oportunidad
                $oportunidades--;

                // Hidden con las oportunidades
                echo '<input type="hidden" value="', $oportunidades, '" name="oportunidades">';

                // Submit y </form>
                 echo '<br><input type="submit" name="submit">';
                 echo '</form>';
                 echo '<h3>Te quedan ', $oportunidades,'</h3>';

            } else if ($oportunidades == 1 && $correcto == 0) {
                // Si se acaban las oportunidades y aun no se ha introducido
                // el numero correcto, denegamos el acceso
                echo '<h4>Acceso Denegado</h4>';

            } else if ($correcto == 1) {
                // En el caso de que consigamos el numero correcto, garantizaremos
                // el acceso.
                echo '<h4>Acceso Garantizado</h4>';

            }
        }
        
        
        ?>
    </body>
</html>
