<html>
    <head>
        <title>Ejercicio 6</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $base = $_GET['base'];
        $altura = $_GET['altura'];
        $area = ($base * $altura) / 2;
        ?>
        
        El area es:  <?php echo $area ?>
        <br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>


