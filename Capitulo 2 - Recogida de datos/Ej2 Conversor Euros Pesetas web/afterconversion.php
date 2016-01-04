<html>
    <head>
        <title>Ejercicio 2</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $euros = $_GET['euros'];
        $pesetas = $euros * 166.386;
        ?>
        
        <?php echo $euros?> son <?php echo $pesetas ?> pesetas
        <br><br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>