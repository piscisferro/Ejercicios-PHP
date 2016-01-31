<?php
require '../Model/Articulo.php';

if (isset($_POST["addArticulo"])) {
    
    $fecha = date('d-m-Y H:i');
    $articulo = new Articulo($_POST["tituloAdd"], $_POST["descripcionAdd"], $_POST["autorAdd"], $fecha, $_POST["categoriaAdd"]);
    
    $articulo->insert();
    
    header('Location: ../Controller/index.php');
    
} else {
    
    // Carga la cabecera
    include '../View/cabecera.php';

    // Carga el Formulario
    include '../View/formAddArticulo.php';
    
    // Carga el pie de pagina
    include '../View/piedepagina.php';

}

