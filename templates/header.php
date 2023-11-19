<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <title><?php echo $titulo ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <header>
    <div class="collapse text-bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>Acerca de</h4>
            <p class="text-body-secondary">Esta es mi Tienda</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>Contacto</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" />
          </svg>
          <strong>Tienda</strong>
        </a>
        <a href="index.php" class="btn text-white my-2 <?php if ($activo == "tienda") echo 'active' ?>"><strong>Tienda</strong></a>

        <a href="login.php" class="btn text-white my-2 <?php if ($activo == "login") echo 'active' ?>"><strong>Login</strong></a>
        <a href="registro.php" class="btn text-white my-2 <?php if ($activo == "registro") echo 'active' ?>"><strong>Registro</strong></a>
        <a href="carrito.php" class="btn text-white my-2 <?php if ($activo == "carrito") echo 'active' ?>">
          <strong><i class="bi bi-cart"></i></strong>
          <?php
          //Verifica si el array esta vacio
          if (empty($_SESSION["listaproductos"])) {
            echo '0';
          } else {
            $totalCantidad = 0;
            //Crea un bucle del array para sacar la cantidad
            foreach ($_SESSION["listaproductos"] as $producto) {
              //suma la cantidad + la cantidad
              $totalCantidad += $producto["cantidad"];
            }
            echo "(" . $totalCantidad . ")";
          }

          ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      </div>
    </div>
  </header>