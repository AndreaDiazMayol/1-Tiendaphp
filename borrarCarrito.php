<?php
session_start();
$_SESSION["listaproductos"] = [];
$url = $_SERVER['HTTP_REFERER'];
header("Location: " . $url);
