<html>
    <head>
        <title>Ejercicio 6</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $baseImponible = $_GET['baseImponible'];
        $resultado = $baseImponible / 0.21;
        ?>
        
        La factura total es:  <?php echo $resultado ?>
        <br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>


