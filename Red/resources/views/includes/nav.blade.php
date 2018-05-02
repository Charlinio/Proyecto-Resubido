    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" name="button" class="navbar-toggle" data-toggle="collapse" data-target="#Menu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand"><img src="../img/logo4.png"></a>
        </div>
        <p class="navbar-text titula"> Red Integral de Bienetar Social </p>
        <p class="navbar-text"> | </p>
        <p class="navbar-text"> Hoy es <span id="dia">11</span> de <span id="mes">Febrero</span> del <span id="anio">2018</span> </p>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><i class="fas fa-bell"></i><span class="notificaiones">0</span> &nbsp&nbsp Notificaciones</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mi perfil<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
        <div class="navbar-right">
          <form class="form-inline">
            <div class="input-group">
              <input type="text" class="form-control busca" placeholder="Buscar">
              <span class="input-group-btn">
                <button class="btn buscar" type="button">
                  <i class="fas fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </nav>

  @section('scriptnav')
    <script>
      $(document).ready(function(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth(); //January is 0!
        var yyyy = today.getFullYear();
        var months = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
               "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
        var mes = months[mm];

        $('#dia').text(dd);
        $('#mes').text(mes);
        $('#anio').text(yyyy);
      });
    </script>
  @endsection
