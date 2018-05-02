<div class="col-md-2 vertical text-center">
  <div class="row cabeza">
    <div class="contenedorimagen">
      @yield('imagenaso')
    </div>
    <h5>{{ Auth::user()->name }}</h5>
    <h5>@yield('asoname')</h5>
  </div>
  @if( Auth::user()->privilegios == 'Administrador' )
  <div class="row">
    <a href="{{ url('/admin') }}" class="{{ Request::is('admin') ? 'activo' : '' }}">
      <i class="fas fa-home"></i>
      | Inicio
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/publicar') }}" class="{{ Request::is('admin/publicar') ? 'activo' : '' }}">
      <i class="fas fa-share-square"></i>
      | Publicar
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/actas') }}" class="{{ Request::is('admin/actas') ? 'activo' : '' }}">
      <i class="fas fa-book"></i>
      | Actas
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/eventos') }}" class="{{ Request::is('admin/eventos') ? 'activo' : '' }}">
      <i class="fas fa-calendar-alt"></i>
      | Eventos
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/finanzas') }}" class="{{ Request::is('admin/finanzas') ? 'activo' : '' }}">
      <i class="fas fa-dollar-sign"></i>
      | Finanzas
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/asociaciones') }}" class="{{ Request::is('admin/asociaciones') ? 'activo' : '' }}">
      <i class="fas fa-building"></i>
      | Asociaciones
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/usuarios') }}" class="{{ Request::is('admin/usuarios') ? 'activo' : '' }}">
      <i class="fas fa-user-plus"></i>
      | Usuarios
    </a>
  </div>
  @elseif(Auth::user()->privilegios == 'Normal')
  <div class="row">
    <a href="{{ url('/admin/publicar') }}" class="{{ Request::is('admin/publicar') ? 'activo' : '' }}">
      <i class="fas fa-share-square"></i>
      | Publicar
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin') }}" class="{{ Request::is('admin') ? 'activo' : '' }}">
      <i class="fas fa-home"></i>
      | Estado Financiero
    </a>
  </div>
  <div class="row">
    <a href="{{ url('/admin/actas') }}" class="{{ Request::is('admin/actas') ? 'activo' : '' }}">
      <i class="fas fa-book"></i>
      | Actas
    </a>
  </div>
  @endif
</div>
