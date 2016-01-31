<div class="container">
    <section class="form">
        <h2 class="page-header">Modificar Post</h2>
        <form action="../Controller/updateArticulo.php" method="post">
            <div class="form-group">
            <h4>Titulo:</h4>
            <input class="form-control" type="text" name="tituloUpdate" placeholder="<?=$_POST["updateTitulo"]?>" autofocus>
            </div>
            <div class="form-group">
            <h4>Descripcion:</h4>
            <textarea class="form-control" name="articuloUpdate" placeholder="<?=$_POST["updateArticulo"]?>"></textarea>
            </div>
            <div class="form-group">
            Autor: 
            <input class="form-control" type="text" name="autorUpdate" placeholder="<?=$_POST["updateAutor"]?>">
            </div>
            <div class="form-group">
            Categoria:
            <input class="form-control" type="text" name="categoriaUpdate" placeholder="<?=$_POST["updateCategoria"]?>">
            </div>
            <input type="hidden" name="idUpdate" value="<?=$_POST["updateId"]?>">
            <input class="btn btn-primary" type="submit" name="update" value="Modificar">
        </form>
    </section>
</div>