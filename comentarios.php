<?php
session_start();
$id = $_GET["id"];
//Verifica si no existe
if (empty($_POST['comentario'])) {
} else {
    $com = $_POST["comentario"];
    //Verifica si tiene comentarios para el ID
    if (empty($_SESSION["comentarios"][$id])) {
        // Si no hay comentarios para este ID, crea un nuevo array
        $_SESSION["comentarios"][$id] = ["comentario0" => $com];
    } else {
        // Si ya hay comentarios, agrega uno nuevo al final del array
        $index = count($_SESSION["comentarios"][$id]);
        $_SESSION["comentarios"][$id]["comentario$index"] = $com;
    }
}
$url = $_SERVER['HTTP_REFERER'];
header("location: " . $url);
