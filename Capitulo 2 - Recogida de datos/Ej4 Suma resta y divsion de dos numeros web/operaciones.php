<html>
    <head>
        <title>Ejercicio 4</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $numero1 = $_GET['numero1'];
        $numero2 = $_GET['numero2'];
        $suma = $numero1 + $numero2;
        $resta = $numero1 - $numero2;
        $division = $numero1 / $numero2;
        ?>
        
        El resultado de la suma es:  <?php echo $suma ?><br>
        El resultado de la resta es:  <?php echo $resta ?><br>
        El resultado de la division es:  <?php echo $division ?><br>
        <br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>


