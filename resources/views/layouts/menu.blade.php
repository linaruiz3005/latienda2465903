<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiendaPHP</title>
</head>
<body>
<nav class="purple lighten-3">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">LaTiendaPHP</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="badges.html">Productos</a></li>
        <li><a href="collapsible.html">Pedidos</a></li>
      </ul>
    </div>
  </nav>
    <div class="container">
        @yield('contenido')
    </div>
    <script src="{{ asset('materialize/js/mateialize.js') }}"></script>
</body>
</html>