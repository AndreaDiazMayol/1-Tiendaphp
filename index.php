<header data-bs-theme="dark">
    <?php
    $titulo = "Tienda";
    $activo = "tienda";
    require_once "templates/header.php";
    ?>
</header>

<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Productos</h1>
                <p class="lead text-body-secondary">Una gran seleccion de productos
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                require_once "crud/conexion.php";

                $consulta_sql = "SELECT * FROM productos"; // consultar todos los registros
                $resultado = $conexion->query($consulta_sql);
                function escribir($p)
                {
                    if (count($p) > 1 && count($p) > 8) {
                        for ($i = 0; $i < 8; $i++) {
                            echo $p[$i] . " ";
                        }
                    } elseif (count($p) > 1 && count($p) < 8) {
                        for ($i = 0; $i < count($p); $i++) {
                            echo $p[$i] . " ";
                        }
                    } else {
                        echo $p[0];
                    }
                }


                while ($fila = $resultado->fetch_object()) {
                    $descripcion = $fila->descripcion;
                    $nombre = $fila->nombre;
                    $palabras = explode(" ", $descripcion);

                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="crud/img/<?php echo $fila->imagen ?> " class="" height="400px">
                            <h3><?php echo $fila->nombre ?></h3>
                            <div class="card-body">
                                <p class="card-text"><?php escribir($palabras) ?>...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="detalle.php?id=<?php echo $fila->id ?>"><button type="button" class="btn btn-primary">Ver detalles</button></a>
                                        <form action="addCarrito.php" method="get">
                                            <input type="hidden" name="id" value="<?php echo $fila->id ?>">
                                            <button type="submit" class="btn btn-primary ms-1">Añadir al carrito</button>
                                        </form>
                                    </div>
                                    <small class="text-body-secondary">X mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php    }
                ?>
            </div>
        </div>
    </div>



</main>

<?php
require_once "templates/footer.php";
?>