<?php
// Importamos la clase Articulo
require '../Model/Articulo.php';

// Si el formulario ha sido mandado
if (isset($_POST["borrarArticulo"])) {
    
    // Recogemos el articulo deseado de la base de datos por su ID
    $articulo = Articulo::getArticuloById($_POST["deleteId"]);
    
    // Procedemos a borrar el articulo escogido
    $articulo->delete();
    
    // Volvemos a index.php
    header('Location: ../Controller/index.php');
    
} else { // Si no se ha mandado el formulario mandamos mensaje de error y volvemos al index
    
    ?>
<p class="error"> Se ha producido un error sera redirigido a la pagina anterior en 5 segundos</p>
<?php

    header("refresh:4;url=../Controller/index.php");

}

