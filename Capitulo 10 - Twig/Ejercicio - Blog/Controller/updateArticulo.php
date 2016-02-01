<?php
// Importamos las clases Articulo y el Autoloader de twig
require_once '../Model/Articulo.php';
require_once 'Twig/lib/Twig/Autoloader.php';

// Inicializamos Twig
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
$twig = new Twig_Environment($loader);

// Si el formulario ha sido mandado procedemos a modificar el registro en la base de datos
if (isset($_POST["update"])) {
    
    // Recogemos el articulo deseado de la base de datos por su ID
    $articulo = Articulo::getArticuloById($_POST["idUpdate"]);
    
    // Recogemos la fecha y hora actual con formato
    $fecha = date('d-m-Y H:i:s');
    
    // Modificamos los atributos del objeto articulo que extrajimos anteriormente
    $articulo->setter($_POST["tituloUpdate"], $_POST["descripcionUpdate"], $_POST["autorUpdate"], $fecha, $_POST["categoriaUpdate"]);
    
    // Le hacemos un update para modificarlo en la base de datos
    $articulo->update();
    
    // Regresamos a index
    header('Location: ../Controller/index.php');
    
} else { // En el caso de que no se haya mandado el formulario lo mostramos

    // Datos del articulo a modificar para pasar por la plantilla twig
    $data["id"] = $_POST["updateId"];
    $data["titulo"] = $_POST["updateTitulo"];
    $data["articulo"] = $_POST["updateArticulo"];
    $data["autor"] = $_POST["updateAutor"];
    $data["categoria"] = $_POST["updateCategoria"];
    
    // Mostramos el formulario mediante la plantilla twig
    echo $twig->render('formUpdateArticulo.html.twig', $data);
}