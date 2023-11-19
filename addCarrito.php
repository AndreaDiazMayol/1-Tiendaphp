<?php
session_start();
//Verifica si enviaron el ID
if (empty($_GET["id"])) {
} else {
    $id = $_GET["id"];
    //Verifica si el array esta vacio
    if (empty($_SESSION["listaproductos"][$id])) {
        // Si no hay productos con el ID lo añade
        $_SESSION["listaproductos"][$id] = ["id" => $id, "cantidad" => 1];
    } else {
        //Si hay productos con el mismo ID suma la cantidad
        $_SESSION["listaproductos"][$id]["cantidad"]++;
    }
}
$url = $_SERVER['HTTP_REFERER'];
header("Location: " . $url);
