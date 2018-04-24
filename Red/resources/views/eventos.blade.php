@extends('includes.principal')
@section('titulo')
Eventos
@endsection

<!-- Nombre e Imagen de la Asociacion que inició sesión -->
@section('asoname')
  @forelse($nombreAsociacion as $nam)
    {{ $nam->nombre }}
  @empty
    Sin Asociación
  @endforelse
@endsection
@section('imagenaso')
  @forelse($nombreAsociacion as $im)
    <img src="../img/logo_asociacion/{{ $im->logo }}" alt="">
  @empty
    Sin Logo
  @endforelse
@endsection

@section('contenido')
<div class="row titulo">
  <h5><i class="fas fa-calendar-alt"></i> Eventos</h5>
</div>
<div class="col-md-2 cajacontroles">
  <button type="button" name="button" class="controles" data-toggle="modal" data-target="#registrarEvento" data-whatever="@mdo">
    <i class="fas fa-calendar-alt"></i>
  </button>
  <p>Nuevo Evento</p>
</div>
<div class="col-md-10">
  @if($errors->any())
    <div class="alert alert-danger alert-dismissable">
      <ul>
        <li>Error al agregar Evento</li>
      </ul>
    </div>
    <div class="alert alert-warning alert-dismissable">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(session()->has('mensaje'))
    <div class="alert alert-success">
      {{ session()->get('mensaje') }}
    </div>
  @endif
</div>
<div class="col-md-12">
  @forelse ($eventos as $evento)
    <div class="col-md-3 cajaeventos">
      <button type="button"
              name="button"
              class="eventos btnAbrir"
              data-toggle="modal"
              data-target="#verEvento"
              data-whatever="@mdo"
              data-titulo="{{ $evento->titulo }}"
              data-descripcion="{{ $evento->descripcion }}"
              data-lugar="{{ $evento->lugar }}"
              data-fecha="{{ $evento->fecha_hora }}"
              data-imagen="{{ $evento->imagen }}">
        <div class="verevento"><p>Abrir</p></div>
        <img src="../img/eventos/{{ $evento->imagen }}" alt="">
      </button>
      <p>{{ $evento->titulo }}</p>
      <button type="button"
              name="button"
              class="botones btnEdit"
              data-toggle="modal"
              data-target="#editarEvento"
              data-whatever="@mdo"
              data-titulo="{{ $evento->titulo }}"
              data-descripcion="{{ $evento->descripcion }}"
              data-lugar="{{ $evento->lugar }}"
              data-fecha="{{ $evento->fecha_hora }}"
              data-imagen="{{ $evento->imagen }}"
              data-id="{{ $evento->id_evento }}">Modificar
      </button>
      <button type="button"
              name="button"
              class="botoneliminar btnDelete"
              data-toggle="modal"
              data-target="#eliminarEvento"
              data-whatever="@mdo"
              data-titulo="{{ $evento->titulo }}"
              data-id="{{ $evento->id_evento }}">
          <i class="fas fa-times"></i>
      </button>
    </div>
  @empty
  <p>Sin registros</p>
  @endforelse

</div>

<!--Modal que muestra el evento -->
<div class="modal fade" id="verEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="verEventoLabel">Titulo del Evento</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <img src="#" alt="" width="300px" height="260px" id="ImagenEvento">
            <br><br>
            <p><b id="TituloEvento">Navidad en RIBS</b></p>
            <p style="text-align:justify;" id="DescEvento">El proximo 20 de Diciembre del 2018 se celebrara la navidad en RIBS, en donde se regalaran muchas cosas!
              , el evento sera en las Instalaciones de FECHAC en el fraccionamiento Juan Pablo II, No te lo pierdas!</p>
              <br>
            <div class="col-md-6">
              <p style="text-align:left;"><b>Lugar: </b><span id="LugarEvento">Instalaciones de FECHAC</span></p>
            </div>
            <div class="col-md-6">
              <p style="text-align:left;"><b>Fecha: </b><span id="FechaEvento">20 de Diciembre del 2018 </span></p>
            </div>
            <div class="col-md-offset-6 col-md-6">
              <p style="text-align:left;"><b>Hora: </b><span id="HorarioEvento">20 de Diciembre del 2018 </span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--Modal para registrar Evento -->
<div class="modal fade" id="registrarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarEventoLabel">Registrar Evento</h4>
      </div>
      <div class="modal-body">

        {{ Form::open(array('url' => '/admin/eventos', 'files' => true)) }}
        <div class="form-group row">
          <label for="titulo" class="col-md-4 labeles">Titulo: </label>
          <div class="col-md-8">
            {{ Form::text('titulo', '', array('class' => 'form-control', 'placeholder' => 'Titulo')) }}
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="descripcion" class="col-md-4 labeles">Descripción: </label>
          <div class="col-md-8">
            <textarea name="descripcion" rows="8" cols="80" placeholder="Descripción" class="form-control"></textarea>
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="fecha" class="col-md-4 labeles">Fecha: </label>
          <div class="col-md-8">
            {{ Form::date('fecha', '', array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group row">
          <label for="hora" class="col-md-4 labeles">Hora: </label>
          <div class="col-md-8">
            {{ Form::time('hora', '', array('class' => 'form-control')) }}
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="lugar" class="col-md-4 labeles">Lugar: </label>
          <div class="col-md-8">
            {{ Form::text('lugar', '', array('class' => 'form-control', 'placeholder' => 'Lugar')) }}
          </div>
        </div>
        <br>
        <div class="form-group row">
          <label for="imagen">Imagen: </label>
          <div class="col-md-12">
            {{ Form::file('imagen', array('class' => 'form-control', 'id' => 'cargarImagen')) }}
          </div>
          <br><br><br>
          <div class="col-md-12">
            <img src="#" alt="" class="editarImagenUsuario" id="cajaImagenEvento">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>

        {{ Form::close() }}
    </div>
  </div>
</div>
<!--Modal para editar Evento -->
<div class="modal fade" id="editarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editarEventoLabel">Editando a: <b id="editando">Nombre</b></h4>
      </div>
      <div class="modal-body">

        {!! Form::open(array('route'=>['admin.eventos.update', $evento->id_evento], 'method'=>'PUT', 'files'=>'true')) !!}
        <input type="hidden" name="idEditar" value="" id="idEditar">
        <div class="form-group row">
          <label for="titulo_eE" class="col-md-4">Titulo: </label>
          <div class="col-md-8">
            <input type="text" name="titulo_eE" value="" id="titulo_eE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="descripcion_eE" class="col-md-4">Descripcion: </label>
          <div class="col-md-8">
            <textarea name="descripcion_eE" value="" id="descripcion_eE" class="form-control" rows="8" cols="50">
            </textarea>
          </div>
        </div>
        <div class="form-group row">
            <label for="fecha_eE" class="col-md-4">Fecha: </label>
          <div class="col-md-8">
            <input type="date" name="fecha_eE" value="" id="fecha_eE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
            <label for="hora_eE" class="col-md-4">Hora: </label>
          <div class="col-md-8">
            <input type="time" name="hora_eE" value="" id="hora_eE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="lugar_eE" class="col-md-4">Lugar: </label>
          <div class="col-md-8">
            <input type="text" name="lugar_eE" value="" id="lugar_eE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <label for="imagen_eE">Imagen: </label>
            <input type="file" name="imagen_eE" value="" id="imagen_eE" class="form-control">
            <br>
            <input type="hidden" name="nombreImagen" value="" id="nombreImagen">
            <div class="col-md-12">
              <img src="#" alt="" class="editarImagenUsuario" id="cajaEditarImagenEvento">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="button">Guardar Cambios</button>
        <button type="button" class="btn btn-danger " data-dismiss="modal">Cancelar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!--Modal para eliminar asociacion -->
<div class="modal fade" id="eliminarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="eliminarEventoLabel">Eliminando a: <b id="eliminando">Nombre</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.eventos.destroy', $evento->id_evento], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="idEliminar" value="" id="idEliminar">
        <label for="">Seguro que desea eliminar este registro?</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="button">Eliminar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
      $(".btnAbrir").on('click', function(){
        var title = $(this).data('titulo');
        var desc = $(this).data('descripcion');
        var place = $(this).data('lugar');
        var date = $(this).data('fecha');
        var img = $(this).data('imagen');

        var fecha = date.substring(0,10);
        var hora = date.substring(11,16);

        $("#verEventoLabel").text(title);
        $("#TituloEvento").text(title);
        $("#DescEvento").text(desc);
        $("#LugarEvento").text(place);
        $("#FechaEvento").text(fecha);
        $("#HorarioEvento").text(hora);
        $("#ImagenEvento").attr("src","../img/eventos/" + img);
      });
      $(".btnEdit").on('click', function(){
        var title = $(this).data('titulo');
        var desc = $(this).data('descripcion');
        var place = $(this).data('lugar');
        var date = $(this).data('fecha');
        var img = $(this).data('imagen');
        var id = $(this).data('id');

        var fecha = date.substring(0,10);
        var hora = date.substring(11,16);

        $("#editando").text(title);
        $("#idEditar").val(id);
        $("#titulo_eE").val(title);
        $("#descripcion_eE").val(desc);
        $("#lugar_eE").val(place);
        $("#fecha_eE").val(fecha);
        $("#hora_eE").val(hora);

      });
      $(".btnDelete").on('click', function(){
        var title = $(this).data('titulo');
        var id = $(this).data('id');

        $('#eliminando').text(title);
        $('#idEliminar').val(id);
      });

      function readURL(input, caja) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $(caja).attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#cargarImagen").change(function() {
        readURL(this, '#cajaImagenEvento');
      });
      $("#imagen_eE").change(function() {
        readURL(this, '#cajaEditarImagenEvento');
        var nombreimg = $('#cargarEditarImagen')[0].files[0];
        $('#nombreImagen').val(nombreimg.name);
      });

    });
  </script>
@endsection
