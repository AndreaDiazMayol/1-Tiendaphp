    <header data-bs-theme="dark">
        <?php
        require_once "crud/conexion.php";
        $id = $_GET["id"];
        $consulta_sql = "SELECT * FROM productos  WHERE id =" . $id;
        $sentencia = $conexion->query($consulta_sql);
        $articulo = $sentencia->fetch_object();
        if ($articulo) {
            $nombre = $articulo->nombre;
            $descripcion = $articulo->descripcion;
            $precio = $articulo->precio;
            $imagen = $articulo->imagen;
        }
        $titulo = $nombre;
        require_once "templates/header.php"; ?>
    </header>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><?php echo $nombre ?></h1>
                    <img src="crud/img/<?php echo $imagen ?>" alt="" width="400px" height="400px">
                    <h2 class="text-danger text-center"><?php echo $precio ?>€</h2>
                    <p><?php echo $descripcion ?></p>
                    <p class="text-center"><a class="btn btn-primary" href="addCarrito.php?id=<?php echo $id; ?>">Añadir al Carrito</a></p>
                    <br>
                </div>
            </div>
            <div class="text-start">
                <h2 class=" text-center ">Comentarios:</h2>
                <form method="post" action="comentarios.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                    <label for="Comentarios">
                        <h4>Escribe un comentario:</h4>
                    </label> <br>
                    <textarea name="comentario" id="comentario" cols="200" rows="5"></textarea> <br>
                    <input class="btn btn-primary" type="submit" value="Enviar">
                </form>
                <?php
                // $_SESSION["comentarios"] = [];
                $i = 1;
                //Verifica si tiene comentarios para el ID
                if (empty($_SESSION["comentarios"][$id])) {
                    echo "No hay comentarios";
                } else {
                    //Crea un bucle del array[$id]; $key= ComentarioX; $comentario = 'Los comentarios enviados'
                    foreach ($_SESSION["comentarios"][$id] as $key => $cometario) {
                        echo "<h4>Comentario $i</h4>";
                        echo "<p>$cometario</p>";
                        $i++;
                    }
                }
                ?>
                <form class=" text-center" action='borrarTodosComentario.php?id=<?php echo $id ?>' method='post' onSubmit="window.confirm('Estas seguro?')"><input class="btn btn-primary" type='submit' value='borrar'></form>

            </div>

        </section>
    </main>

    <?php
    require_once "templates/footer.php";
    ?>