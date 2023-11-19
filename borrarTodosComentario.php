<?php
session_start();
$id = $_GET["id"];
//Verifica si tiene comentarios para el ID
if (isset($_SESSION["comentarios"][$id])) {
    //Si tiene comentarios los borra
    unset($_SESSION["comentarios"][$id]);
} else {
}

$url = $_SERVER['HTTP_REFERER'];
header("Location: " . $url);
