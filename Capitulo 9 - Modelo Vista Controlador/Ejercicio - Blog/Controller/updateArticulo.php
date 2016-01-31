<?php
require '../Model/Articulo.php';

if (isset($_POST["update"])) {
    
    $articulo = Articulo::getArticuloById($_POST["idUpdate"]);
    
    $fecha = date('d-m-Y H:i');
    $articulo->setter($_POST["tituloUpdate"], $_POST["articuloUpdate"], $_POST["autorUpdate"], $fecha, $_POST["categoriaUpdate"]);
    $articulo->update();
    
    header('Location: ../Controller/index.php');
    
} else {

    // Carga la cabecera
    include '../View/cabecera.php';

    // Carga el Formulario
    include '../View/formUpdateArticulo.php';
    
    // Carga el pie de pagina
    include '../View/piedepagina.php';
    
}