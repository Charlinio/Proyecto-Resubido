<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href=" ../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/dashboard.css">
  	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <title>@yield('titulo')</title>
  </head>
  <body>
    <!-- NAVBAR -->
    @include('/includes/nav')

    <!-- CONTENIDO -->
    <div class="col-md-offset-2 col-md-10 contenido">
      @yield('contenido')
    </div>

    <!-- MENU VERTICAL -->
    @include('/includes/menuvertical')


    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/fontawesome-all.min.js"></script>
    @yield('scripts')
    @yield('scriptnav')
  </body>
</html>
