<?php
// Importamos las clases Articulo y el Autoloader de twig
require_once '../Model/Articulo.php';
require_once 'Twig/lib/Twig/Autoloader.php';

// Inicializamos Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);

// Si el formulario se ha mandado, procedemos a insertar el nuevo articulo
if (isset($_POST["addArticulo"])) {
    
    // Guardamos la fecha actual con formato
    $fecha = date('d-m-Y H:i:s');
    // Creamos un nuevo objeto con la informacion del formulario
    $articulo = new Articulo($_POST["tituloAdd"], $_POST["descripcionAdd"], $_POST["autorAdd"], $fecha, $_POST["categoriaAdd"]);
    
    // Insertamos el objeto en la base de datos
    $articulo->insert();
    
    // Volvemos a index.php
    header('Location: ../Controller/index.php');
    
} else { // Si no se ha mandado el formulario lo cargamos
//
    // Cargamos la plantilla twig
    echo $twig->render('formAddArticulo.html.twig');

}

