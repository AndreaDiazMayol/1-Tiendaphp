<?php
//Conectamos con el servidor 
$conexion = new mysqli("localhost", "root", "");

//Creamos la base de datos si no existe
$consulta = "CREATE DATABASE IF NOT EXISTS Tienda;";
$conexion->query($consulta);

//Seleccionamos la base de datos y creamos la tabla si no existe
$conexion->select_db("Tienda");
$consulta = "CREATE TABLE IF NOT EXISTS productos (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        descripcion TEXT,
        precio DECIMAL (65,2) NOT NULL,
        imagen VARCHAR(255) NOT NULL,
/*         destacado BOOLEAN, */ 
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );";
$conexion->query($consulta);

//Si la tabla está vacía, añadimos datos de ejemplo
$consulta = "SELECT nombre FROM productos";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows < 1) {

    $consulta = "INSERT INTO productos (nombre, descripcion, imagen, precio, created_at, updated_at) 
        VALUES ('Prusa MK4', 'Original Prusa MK4 se basa en la nueva arquitectura conectada de 32 bits y el extrusor de última generación Nextruder.', 'img1.jpg', 999, '2022-10-27 04:01:14', '2022-10-27 04:01:14');";

    $conexion->query($consulta);
};

function escapar($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function csrf()
{
    session_start();

    if (empty($_SESSION['csrf'])) {
        if (function_exists('random_bytes')) {
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
        } else if (function_exists('mcrypt_create_iv')) {
            $_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }
}
