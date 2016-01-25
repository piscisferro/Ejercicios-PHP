<?php 

$data["articulos"] = Articulo::getArticulos();

foreach ($data["articulos"] as $articulo) {
    ?>
    <div class="articulo"> 
        <h2><?=$articulo.titulo?></h2>
        <article><?=$articulo.articulo?></article>
        <footer>
            <p>Tags: <?=$articulo.tags?></p>
            <p>Escrito por: <?=$articulo.autor?> en <?=$articulo.fecha?></p>
        </footer>
    </div>
<?php 
}
?>
