<?php 

$data["articulos"] = Articulo::getArticulos();

foreach ($data["articulos"] as $articulo) {
    ?>
    <div class="articulo"> 
        <h2><?=$articulo->getTitulo()?></h2>
        <article><?=$articulo->getArticulo()?></article>
        <footer>
            <p>Tags: <?=$articulo->getTags()?></p>
            <p>Escrito por: <?=$articulo->getAutor()?> en <?=$articulo->getFecha()?></p>
            <form action="deleteArticulo.php" method="post">
                <input type="submit" name="borrarArticulo" value="Borrar">
                <input type="hidden" name="deleteId" value="<?=$articulo->getId()?>">
            </form>
        </footer>
    </div>
<?php 
}
?>
