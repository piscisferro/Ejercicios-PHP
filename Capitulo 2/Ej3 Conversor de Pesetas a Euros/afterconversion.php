<html>
    <head>
        <title>Ejercicio 3</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $pesetas = $_GET['pesetas'];
        $euros = $pesetas* 0.006;
        ?>
        
        <?php echo $pesetas?> son <?php echo $euros ?> euros
        <br><br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>