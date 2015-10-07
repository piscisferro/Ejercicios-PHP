<!DOCTYPE html>
<!--
Ejercicio 7
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.
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
        
        
        
        // Oportunidades
        
        if (!isset($_POST['submit'])) {
        
            $oportunidades = 5;
            
            // Imprimir Formulario
            echo '<form action="index.php" method="post">';
            echo '<input type="text" name="digito1" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito2" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito3" size="1" maxlength = "1" placeholder="-">';
            echo '<input type="text" name="digito4" size="1" maxlength = "1" placeholder="-">';
            
            // Oportunidades
            echo '<input type="hidden" name="oportunidades" value="', $oportunidades , '">';
            
            echo '<br><input type="submit" name="submit">';
            echo '</form>';
        
        } ////////////////////////////////////////
        
        
        /////////////
        // Obtencion de numeros y variables del input
        ////////////
        
        
        $digito1 = (isset($_POST['digito1']))? $_POST['digito1']:"";
        $digito2 = (isset($_POST['digito2']))? $_POST['digito2']:"";
        $digito3 = (isset($_POST['digito3']))? $_POST['digito3']:"";
        $digito4 = (isset($_POST['digito4']))? $_POST['digito4']:"";
        $correcto = (isset ($_POST['correcto']))? $_POST['correcto']:"";
        $oportunidades = (isset ($_POST['oportunidades']))? $_POST['oportunidades']:"";
        
        // 
        
        if ($digito1 == $combinacionDigito1 && $digito2 == $combinacionDigito2 && $digito3 == $combinacionDigito3 && $digito4 == $combinacionDigito4) {

            $correcto = 1;
        } else {
            $correcto = 0;
        }
        
        if (isset($_POST['submit'])) {
            
            if ($oportunidades > 1 && $correcto == 0) {
            
                // Imprime Formulario
                echo '<form action="index.php" method="post">';
                echo '<input type="text" name="digito1" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito2" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito3" size="1" maxlength = "1" placeholder="-">';
                echo '<input type="text" name="digito4" size="1" maxlength = "1" placeholder="-">';


                if ($digito1 == $combinacionDigito1 && $digito2 == $combinacionDigito2 && $digito3 == $combinacionDigito3 && $digito4 == $combinacionDigito4) {

                    echo '<input type="hidden" name="correcto" value="1">';

                } else {
                    echo '<input type="hidden" name="correcto" value="0">'; 
                }

                $oportunidades--;

                // Hidden

                echo '<input type="hidden" value="', $oportunidades, '" name="oportunidades">';

                // Submit y </form>

                 echo '<br><input type="submit" name="submit">';
                 echo '</form>';
                 echo '<h3>Te quedan ', $oportunidades,'</h3>';

            } else if ($oportunidades == 1 && $correcto == 0) {

                echo '<h4>Acceso Denegado</h4>';

            } else if ($correcto == 1) {

                echo '<h4>Acceso Garantizado</h4>';

            }
        }
        
        
        ?>
    </body>
</html>
