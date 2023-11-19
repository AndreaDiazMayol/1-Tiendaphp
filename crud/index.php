<?php
include "conexion.php";
include "templatesCrud/header.php";
csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
    die();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="crear.php" class="btn btn-primary mt-4">Crear producto</a>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="" method="post" class="form-inline">
                <div class="form-group mr-3">
                    <input type="text" id="nombre" name="nombre" placeholder="Buscar por nombre" class="form-control">
                </div>
                <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
                <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $consultaSQL = "SELECT * FROM productos WHERE nombre LIKE '%$nombre%'";
        $titulo = ($nombre != "") ? "Lista de productos $nombre " : 'Lista de productos';
    } else {
        $consultaSQL = "SELECT * FROM productos";
        $titulo = 'Lista de productos';
    }

    echo "<h1 class='mt-3'>$titulo</h1>";
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $consulta = $conexion->query($consultaSQL);
            while ($elemento = $consulta->fetch_object()) {
                $id = $elemento->id;
                $nombre = $elemento->nombre;
                $descripcion = $elemento->descripcion;
                $precio = $elemento->precio;
                $imagen = $elemento->imagen;
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nombre</td>";
                $aux = strlen($descripcion) > 15 ? substr($descripcion, 0, 15) . "..." : $descripcion;
                echo "<td> $aux </td>";
                echo "<td>$precio</td>";
                echo "<td><img src='img/$imagen' style='height:100px'></td>";
                echo "<td><form action='borrar.php?id=$id' method='post' onSubmit='return confirm(\"Seguro?\")'><input type='submit' value='borrar'></form>";
                echo "<a href='editar.php?id=$id'>✏️Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include "templatesCrud/footer.php";
?>