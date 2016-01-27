<?php
require '../Model/Articulo.php';

if (isset($_POST["addArticulo"])) {
    
    $fecha = date('d-m-Y H:i');
    $articulo = new Articulo($_POST["tituloAdd"], $_POST["descripcionAdd"], $_POST["autorAdd"], $fecha, $_POST["tagsAdd"]);
    
    $articulo->insert();
    
    header('Location: ../Controller/index.php');
    
} else {
    
    ?>
<p class="error"> Se ha producido un error sera redirigido a la pagina anterior en 5 segundos</p>
<?php

    header("refresh:4;url=../View/formAddArticulo.php");

}

