@extends('includes.principal')
@section('titulo')
Asociaciones
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
  <h5><i class="fas fa-user-plus"></i> Asociaciones</h5>
</div>

<div class="row">
    <div class="col-md-2 cajacontroles">
      <button type="button"
        name="button"
        class="controles"
        data-toggle="modal"
        data-target="#registrarAsociacion"
        data-whatever="@mdo">
        <i class="fas fa-plus"></i>
      </button>
      <p>Nueva Asociación</p>
    </div>
  <div class="col-md-10">
    @if($errors->any())
      <div class="alert alert-danger alert-dismissable">
        <ul>
          <li>Error al registrar Asociación</li>
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
      <div class="alert alert-info">
        {{ session()->get('mensaje') }}
      </div>
    @endif
  </div>

</div>

<div class="col-md-12">
  <table class="table">
    <thead>
      <tr>
        <td><center>Id</center></td>
        <td><center>Logo</center></td>
        <td>Datos de la Asociación</td>
        <td><center>Editar</center></td>
        <td><center>Eliminar</center></td>
      </tr>
    </thead>
    <tbody>
      @forelse($registrosAsociaciones as $datos)
        <tr>
          <td><center>{{ $datos->id_asociacion }}</center></td>
          <td><center><img src="../img/logo_asociacion/{{ $datos->logo }}" alt="" class="AsociacionesImg"></center></td>
          <td>
            <p><b class="nombre_asociacion">Nombre:</b> {{ $datos->nombre }}</p>
            <p><b class="nombre_asociacion">Descripción:</b> {{ $datos->descripcion }}</p>
            <p><b class="nombre_asociacion">Teléfono:</b> {{ $datos->contacto }}</p>
            <p><b class="nombre_asociacion">Correo:</b> {{ $datos->correo }}</p>
            <p><b class="nombre_asociacion">Página Web:</b> {{ $datos->web }}</p>
          </td>
          <td><center>
            <button
              type="button"
              name="button"
              style="margin: 50px 0px;"
              data-toggle="modal"
              data-target="#editarAsociacion"
              data-whatever="@mdo"
              class="btn btn-primary btnEdit"
              data-id="{{$datos->id_asociacion }}"
              data-nombre="{{$datos->nombre }}"
              data-descripcion="{{$datos->descripcion }}"
              data-telefono="{{$datos->contacto }}"
              data-correo="{{$datos->correo }}"
              data-web="{{$datos->web }}"
              data-imagen="{{ $datos->logo }}"
              >
              <i class="fas fa-edit"></i>
            </button>
          </center></td>
          <td><center>
            <button
              type="submit"
              style="margin: 50px 0px;"
              class="btn btn-danger btnDelete"
              data-nombre="{{$datos->nombre }}"
              data-id="{{$datos->id_asociacion }}"
              data-toggle="modal"
              data-target="#eliminarAcociacion"
              data-whatever="@mdo">
              <i class="fas fa-times"></i>
            </button>
          </center></td>
        </tr>
      @empty
        <p>Sin registros</p>
      @endforelse
    </tbody>
  </table>
</div>

<!--Modal para registrar asociacion -->
<div class="modal fade" id="registrarAsociacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarAsociacionLabel">Registro de Asociación</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => '/admin/asociaciones', 'files' => true)) }}
        <div class="form-group row">
          <label for="nombre_a" class="col-md-4 labeles"><span class="obligatorio">*</span> Nombre:</label>
          <div class="col-md-8">
            <input type="text" name="nombre_a" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="descripcion_a" class="col-md-4 labeles">Descripción:</label>
          <div class="col-md-8">
            <input type="text" name="descripcion_a" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="telefono_a" class="col-md-4 labeles">Teléfono:</label>
          <div class="col-md-8">
            <input type="text" name="telefono_a" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="correo_a" class="col-md-4 labeles">Correo Electrónico:</label>
          <div class="col-md-8">
            <input type="email" name="correo_a" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="web_a" class="col-md-4 labeles">Sitio Web:</label>
          <div class="col-md-8">
            <input type="text" name="web_a" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="imagen_a">Logo:</label>
          <br>
          <div class="col-md-10 col-md-offset-2">
            <input type="file" name="imagen_a" id="cargarImagen">
            <br>
          </div>
          <div class="col-md-12">
            <img src="#" alt="" class="editarImagenUsuario" id="cajaImagenAsociacion">
          </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
        </div>
        {{ Form::close() }}
    </div>
  </div>
</div>

<!--Modal para editar asociacion -->
<div class="modal fade" id="editarAsociacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editarAsociacionLabel">Editando a: <b id="editando">Nombre</b></h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('route'=>['admin.asociaciones.update', $datos->id_asociacion], 'method'=>'PUT', 'files' => true)) !!}
        <input type="hidden" name="idEditar" value="" id="idEditar">
        <div class="form-group row">
          <label for="nombre_aE" class="col-md-4 labeles">Nombre:</label>
          <div class="col-md-8">
            <input type="text" name="nombre_aE" id="nombre_aE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="descripcion_a" class="col-md-4 labeles">Descripción:</label>
          <div class="col-md-8">
            <input type="text" name="descripcion_aE" id="descripcion_aE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="telefono_a" class="col-md-4 labeles">Teléfono:</label>
          <div class="col-md-8">
            <input type="text" name="telefono_aE" id="telefono_aE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="correo_a" class="col-md-4 labeles">Correo Electrónico:</label>
          <div class="col-md-8">
            <input type="email" name="correo_aE" id="correo_aE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="web_a" class="col-md-4 labeles">Sitio Web:</label>
          <div class="col-md-8">
            <input type="text" name="web_aE" id="web_aE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="imagen_a">Logo:</label>
          <br>
          <div class="col-md-10 col-md-offset-2">
            <input type="file" name="imagen_aE" id="cargarEditarImagen">
            <br>
          </div>
          <input type="hidden" name="nombreImagen" value="" id="nombreImagen">
          <div class="col-md-12">
            <img src="#" alt="" class="editarImagenUsuario" id="cajaEditarImagenAsociacion">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="button">Guardar Cambios</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>

<!--Modal para eliminar asociacion -->
<div class="modal fade" id="eliminarAcociacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="eliminarAsociacionLabel">Eliminando a: <b id="eliminando">Nombre</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.asociaciones.destroy', $datos->id_asociacion], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="idEliminar" value="" id="idEliminar">
        <label for="">Seguro que desea eliminar este registro?<br>Los usuarios ligados a esta Asociación tambien serán eliminados.</label>
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
      readURL(this, '#cajaImagenAsociacion');
    });
    $("#cargarEditarImagen").change(function() {
      readURL(this, '#cajaEditarImagenAsociacion');
      var nombreimg = $('#cargarEditarImagen')[0].files[0];
      $('#nombreImagen').val(nombreimg.name);
    });

    $(".btnDelete").on('click', function(){
      var n = $(this).data('nombre');
      var id = $(this).data('id');

      $('#eliminando').text(n);
      $('#idEliminar').val(id);
    });

    $(".btnEdit").on('click', function(){
      var id = $(this).data('id');
      var n = $(this).data('nombre');
      var tel = $(this).data('telefono');
      var email = $(this).data('correo');
      var web = $(this).data('web');
      var desc = $(this).data('descripcion');
      var img = $(this).data('imagen');

      $('#idEditar').val(id);
      $('#nombre_aE').val(n);
      $('#descripcion_aE').val(desc);
      $('#telefono_aE').val(tel);
      $('#correo_aE').val(email);
      $('#web_aE').val(web);
      $('#editando').text(n);
      $('#nombreImagen').val(img);
    });

  </script>
@endsection
