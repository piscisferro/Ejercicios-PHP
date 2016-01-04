<!DOCTYPE html>
<!--
Ejercicio 1
Escribe un programa que pida por teclado un día de la semana y que diga qué asignatura toca a
primera hora ese día.

Creado por: Juan Jose Fernandez Romero
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        
        <table border="1" width="600" >
            <tr>
                <td>Lunes</td>
                <td>Martes</td>
                <td>Miercoles</td>
                <td>Jueves</td>
                <td>Viernes</td>
            </tr>
            
            <tr>
                <td>1</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DIW</td>
            </tr>
            
            <tr>
                <td>2</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DIW</td>  
            </tr>
            
            <tr>
                <td>3</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DWES</td>
                <td>DWEC</td>
                <td>DIW</td> 
            </tr>
            
            <tr>
                <td></td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>
            </tr>
            
            <tr>
                <td>4</td>
                <td>EINEM</td>
                <td>DAW</td>
                <td>HLC</td>
                <td>EINEM</td>
                <td>DIW</td>
            </tr>
            
            <tr>
                <td>5</td>
                <td>DIW</td>
                <td>DAW</td>
                <td>HLC</td>
                <td>EINEM</td>
                <td>DWES</td>
            </tr>
            
            <tr>
                <td>6</td>
                <td>DIW</td>
                <td>DAW</td>
                <td>HLC</td>
                <td>EINEM</td>
                <td>DWES</td>
            </tr>
        </table>
        <br>
        <br>
        
        <form action="index.php" method="post">
            
            Dia (lunes, martes, miercoles..)<input type="text" name="dia"><br>
            Hora (1, 2, 3..) <input type="number" name="hora"><br><br>
            <input type="submit" value="confirmar">
            
        </form>
        
        <?php
        
        if (isset($_POST['dia'], $_POST['hora'])) {
            
            echo "<br><br>";
            $dia = $_POST['dia'];
            $hora = $_POST['hora'];
            
            switch ($dia) {
                
                case 'lunes':
                    if ($hora == 1) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 2) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 3) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 4) {
                        echo "A esta hora hay EINEM";
                    }
                    if ($hora == 5) {
                        echo "A esta hora hay DIW";
                    }
                    if ($hora == 6) {
                        echo "A esta hora hay DIW";
                    }
                    break;
                    
                case "martes":
                    if ($hora == 1) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 2) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 3) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 4) {
                        echo "A esta hora hay DAW";
                    }
                    if ($hora == 5) {
                        echo "A esta hora hay DAW";
                    }
                    if ($hora == 6) {
                        echo "A esta hora hay DAW";
                    }
                    break;
                    
                case "miercoles":
                    if ($hora == 1) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 2) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 3) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 4) {
                        echo "A esta hora hay HLC";
                    }
                    if ($hora == 5) {
                        echo "A esta hora hay HLC";
                    }
                    if ($hora == 6) {
                        echo "A esta hora hay HLC";
                    }
                    break;
                    
                case "jueves":
                    if ($hora == 1) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 2) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 3) {
                        echo "A esta hora hay DWEC";
                    }
                    if ($hora == 4) {
                        echo "A esta hora hay EINEM";
                    }
                    if ($hora == 5) {
                        echo "A esta hora hay EINEM";
                    }
                    if ($hora == 6) {
                        echo "A esta hora hay EINEM";
                    }
                    break;
                    
                case "viernes":
                    if ($hora == 1) {
                        echo "A esta hora hay DIW";
                    }
                    if ($hora == 2) {
                        echo "A esta hora hay DIW";
                    }
                    if ($hora == 3) {
                        echo "A esta hora hay DIW";
                    }
                    if ($hora == 4) {
                        echo "A esta hora hay DIW";
                    }
                    if ($hora == 5) {
                        echo "A esta hora hay DWES";
                    }
                    if ($hora == 6) {
                        echo "A esta hora hay DWES";
                    }
                    break;
                
            }
        }
        
        ?>
    </body>
</html>
