    <header data-bs-theme="dark">
        <?php
        $titulo = "Carrito";
        $activo = "carrito";
        require_once "templates/header.php";
        ?>

    </header>

    <main>
        <div class="container">
            <?php
            require_once "crud/conexion.php";


            //$_SESSION["listaproductos"] = [];
            //Verifica si el array esta vacio
            if (empty($_SESSION["listaproductos"])) {
                echo "El carrito está vacío";
            } else {
                echo "<table class='table table-striped'>";
                echo "<tr><th>Nombre</th><th>Descripcion</th><th>Imagen</th><th>Cantidad</th><th>Precio</th></tr>";
                $sumatotal = 0;
                //Crea un bucle del array; $id = id; $cantidad = es la cantidad
                foreach ($_SESSION["listaproductos"] as $id => $cantidad) {
                    //Consulta todos los datos en la base de datos del $id
                    $consulta_sql = "SELECT * FROM productos WHERE id =" . $id;
                    $sentencia = $conexion->query($consulta_sql);
                    //Sacamos los datos del producto
                    $articulo = $sentencia->fetch_object();
                    $nombre = $articulo->nombre;
                    $descripcion = $articulo->descripcion;
                    $precio = $articulo->precio;
                    $imagen = $articulo->imagen;

                    $sumatotal += ($precio * $cantidad["cantidad"]);
                    echo "<tr><td><p class=fs-6>$nombre</p></td>";
                    echo "<td><p class=fs-6>$descripcion</p></td>";
                    echo "<td><img src='crud/img/$imagen' style='height:100px'></td>";
                    echo "<td><p class=fs-4><a href='borrarCarrito1.php?id=$id'><i class='bi bi-cart-dash-fill fs-4'></i></a>" . " " . $cantidad['cantidad'] . " " . "<a href='addCarrito.php?id=$id'><i class='bi bi-cart-plus-fill  fs-4'></i></a></p></td>";
                    echo "<td><p class=fs-5>$precio €</p></td></tr>";
                }
                echo "";
                echo   "<tr><th><form action='borrarCarrito.php' method='post' onSubmit='window.confirm('Estas seguro?')'><input class='btn btn-primary ms-1' type='submit' value='Borrar'></form></th><th></th><th></th>";
                if (empty($_SESSION["listaproductos"])) {
                } else {
                    echo "<th>Precio Total: </th><th>$sumatotal €<br>";
                    echo "<form action='compra.php?id=<?php echo $id ?>' method='post' onSubmit='window.confirm('Estas seguro?')'><input class='btn btn-primary ms-1' type='submit' value='Comprar'></form></th></tr>";
                }
            }
            ?>
            </table>
    </main>

    <?php
    require_once "templates/footer.php";
    ?>