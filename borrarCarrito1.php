<?php
session_start();
//Verifica si enviaron el ID
if (empty($_GET["id"])) {
} else {
    $id = $_GET['id'];
    //Verifica si el array esta vacio
    if (empty($_SESSION["listaproductos"][$id])) {
    } else {
        // Si hay mas de un producto con el mismo ID quita uno
        if ($_SESSION["listaproductos"][$id]["cantidad"] > 1) {
            $_SESSION["listaproductos"][$id]["cantidad"]--;
        } else {
            //Si solo hay un producto con el mismo ID lo elimina
            unset($_SESSION["listaproductos"][$id]);
        }
    }
}
$url = $_SERVER['HTTP_REFERER'];
header("Location: " . $url);
