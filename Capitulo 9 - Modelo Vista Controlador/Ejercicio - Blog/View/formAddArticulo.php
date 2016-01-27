<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Blog</title>
    </head>
    <body>
        <div id="contenedor">
            <header class="cabecera">
                <h2 class="tituloHeader">Mi Blog</h2>
                <nav>
                    <ul>
                        <a href="../Controller/index.php"><li>Principal</li></a>
                        <a href="../View/formAddArticulo.php"><li>Añadir Post</li></a>
                    </ul>
                </nav>
            </header>
            
            <section>
                <form action="../Controller/addArticulo.php" method="post">
                    <h3>Titulo</h3>
                    <input type="text" name="tituloAdd" placeholder="titulo" autofocus required>
                    <h3>Descripcion</h3>
                    <textarea name="descripcionAdd" placeholder="Descripcion" required></textarea>
                    <p>Autor:</p> <input type="text" name="autorAdd" placeholder="autor" required>
                    <p>Tags:</p> <input type="text" name="tagsAdd" placeholder="tag1 tag2..." required>
                    <input type="submit" name="addArticulo" value="Añadir">
                </form>
            </section>
        </div>
    </body>
</html>
