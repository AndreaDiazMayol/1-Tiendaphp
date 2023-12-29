<?php
$titulo = "Registro";
require_once "../templates/header.php";
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
  <title>Formulario de Registro</title>
</head>
<body>

<div class='container mt-5'>
  <h2 class='mb-4'>Formulario de Registro</h2>

  <form>
    <div class='mb-3'>
      <label for='nombre' class='form-label'>Nombre</label>
      <input type='text' class='form-control' id='nombre' name='nombre' required>
    </div>

    <div class='mb-3'>
      <label for='apellidos' class='form-label'>Apellidos</label>
      <input type='text' class='form-control' id='apellidos' name='apellidos' required>
    </div>

    <div class='mb-3'>
      <label for='correo' class='form-label'>Correo Electrónico</label>
      <input type='email' class='form-control' id='correo' name='correo' required>
    </div>

    <div class='mb-3'>
      <label for='contrasena' class='form-label'>Contraseña</label>
      <input type='password' class='form-control' id='contrasena' name='contrasena' required>
    </div>

    <button type='submit' class='btn btn-primary'>Enviar</button>
  </form>
</div>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";
require_once "../templates/footer.php";
