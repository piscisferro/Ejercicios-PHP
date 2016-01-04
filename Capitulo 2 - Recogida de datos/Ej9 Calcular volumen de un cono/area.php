<html>
    <head>
        <title>Ejercicio 6</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $radio = $_GET['radio'];
        $altura = $_GET['altura'];
        $volumen = (M_PI / 3) * ($radio * $radio) * $altura;
        ?>
        
        El volumen es:  <?php echo $volumen ?> cm^3
        <br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>


