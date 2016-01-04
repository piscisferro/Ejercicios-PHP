<html>
    <head>
        <title>Ejercicio 3</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $kb = $_GET['kb'];
        $mb = $kb * 0.0009765625;
        ?>
        
        <?php echo $kb?> Kb son <?php echo round($mb, 2) ?> Mb
        <br><br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>