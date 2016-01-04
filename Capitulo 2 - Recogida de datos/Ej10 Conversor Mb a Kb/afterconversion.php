<html>
    <head>
        <title>Ejercicio 3</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $mb = $_GET['mb'];
        $kb = $mb * 1024;
        ?>
        
        <?php echo $mb?> Mb son <?php echo $kb ?> Kb
        <br><br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>