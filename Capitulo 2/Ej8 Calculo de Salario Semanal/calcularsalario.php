<html>
    <head>
        <title>Ejercicio 8</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        
        <?php $horas = $_GET['horas'];
        $pagaPorHora = $_GET ['pagaPorHora'];
        $resultado = $horas * $pagaPorHora;
        ?>
        
        El salario total es:  <?php echo $resultado ?>
        <br><a href="index.html"><button>Atras</button></a>
    </body>
    
    
</html>


