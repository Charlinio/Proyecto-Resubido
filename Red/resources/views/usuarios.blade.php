@extends('/includes/principal')
@section('titulo')
Usuarios
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
  <h5><i class="fas fa-user-plus"></i> Usuarios</h5>
</div>
<div class="col-md-2 cajacontroles">
  <button type="button" name="button" data-toggle="modal" data-target="#registrarUsuario" data-whatever="@mdo"
    class="controles">
    <i class="fas fa-user-plus"></i>
  </button>
  <p>Nuevo usuario</p>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
  <input type="hidden" name="" value="" id="txtBusqueda">
</div>
<div class="col-md-10 cajacontroles">
  @if($errors->any())
    <div class="alert alert-danger alert-dismissable">
      <ul>
        <li>Error al agregar Usuario</li>
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
  <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <td><center>Id</center></td>
          <td><center>Logo</center></td>
          <td>Asociación Perteneciente</td>
          <td>Nombre del Encargado</td>
          <td>Privilegios</td>
          <td>Correo de Contacto</td>
          <td><center>Editar</center></td>
          <td><center>Eliminar</center></td>
        </tr>
      </thead>
      <tbody id="tbody">
        @forelse($usuarios as $usu)
          <tr>
            <td><center>{{ $usu->id }}</center></td>
            <td><center><img src="../img/logo_asociacion/{{ $usu->logo }}" alt="" class="imgperfil"></center></td>
            <td>{{ $usu->nombre }}</td>
            <td>{{ $usu->name }}</td>
            <td>{{ $usu->privilegios }}</td>
            <td>{{ $usu->email }}</td>
            <td><center>
              <button
              type="button"
              name="button"
              data-toggle="modal"
              data-target="#editarUsuario"
              data-whatever="@mdo"
              class="btn btnEdit"
              data-id="{{ $usu->id }}"
              data-nombre="{{ $usu->name }}"
              data-email="{{ $usu->email }}"
              data-asociacion="{{ $usu->asociacion }}"
              data-nivel="{{ $usu->privilegios }}">
                <i class="fas fa-edit"></i>
              </button>
            </center></td>
            <td><center>
              <button
                id="btnEliminar"
                type="button"
                class="btn btn-danger btnDelete"
                data-toggle="modal"
                data-target="#eliminarUsuario"
                data-whatever="@mdo"
                data-nombre="{{ $usu->name }}"
                data-id="{{ $usu->id }}">
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

<!--Modal para registrar Usuario -->
<div class="modal fade" id="registrarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarUsuarioLabel">Registrando Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => '/admin/usuarios')) }}
        <div class="form-group row">
          <label for="nombre" class="col-md-5 labeles"><span class="obligatorio">*</span> Nombre del Encargado: </label>
          <div class="col-md-7">
            {{ Form::text('nombre', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
          </div>
        </div>
        <div class="form-group row">
          <label for="asociacion" class="col-md-5 labeles"><span class="obligatorio">*</span> Asociación Perteneciente: </label>
          <div class="col-md-7">
            <select class="form-control" name="aso">
              @forelse($asociaciones as $asociacion)
                <option value="{{ $asociacion->id_asociacion }}">{{ $asociacion->nombre }}</option>
              @empty
                <option value=""></option>
              @endforelse
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="correo" class="col-md-5 labeles"><span class="obligatorio">*</span> Correo Electrónico: </label>
          <div class="col-md-7">
            {{ Form::email('correo', '', array('class' => 'form-control', 'placeholder' => 'Correo')) }}
          </div>
        </div>
        <div class="form-group row">
            <label for="p1" class="col-md-5 labeles"><span class="obligatorio">*</span> Contraseña: </label>
          <div class="col-md-7">
            {{ Form::password('p1', array('class' => 'form-control', 'placeholder' => 'Contraseña', 'id'=>'txtPass')) }}
          </div>
        </div>
        <div class="form-group row">
          <label for="p2" class="col-md-5 labeles"><span class="obligatorio">*</span> Confirmar Contraseña: </label>
          <div class="col-md-7">
            {{ Form::password('p2', array('class' => 'form-control', 'placeholder' => 'Confirmar Contraseña', 'id'=>'txtConfirmar')) }}
            <p id="lblError" style="color:#FF0000;font-size:1rem;text-align:left;margin-top:5px;"></p>
          </div>
        </div>
        <div class="form-group row">
          <label for="nivel" class="col-md-5 labeles"><span class="obligatorio">*</span> Nivel de Privilegio: </label>
          <div class="col-md-7">
            <select class="form-control" name="nivel">
              <option value="Normal">Normal</option>
              <option value="Administrador">Administrador</option>
            </select>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        {{ Form::close() }}
    </div>
  </div>
</div>

<!--Modal para editar Usuario -->
<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editarUsuarioLabel">Editando a: <b id="editando">Nombre</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.usuarios.edit', $usu->id], 'method'=>'GET')) !!}
      <div class="modal-body">
        <input type="hidden" name="idEditar" value="" id="idEditar">
        <div class="form-group row">
          <label for="nombreE" class="col-md-5 labeles">Nombre del Encargado:</label>
          <div class="col-md-7">
            <input type="text" name="nombreE" id="nombreE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="asociacionE" class="col-md-5 labeles">Asociación Perteneciente:</label>
            <div class="col-md-7">
              <select class="form-control" name="asociacionE" id="asociacionE">
                @forelse($asociaciones as $asociacion)
                  <option value="{{ $asociacion->id_asociacion }}">{{ $asociacion->nombre }}</option>
                @empty
                  <option value=""></option>
                @endforelse
              </select>
            </div>
        </div>
        <div class="form-group row">
          <label for="emailE" class="col-md-5 labeles">Correo Electrónico:</label>
          <div class="col-md-7">
            <input type="email" name="emailE" id="emailE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="pE" class="col-md-5 labeles">Contraseña:</label>
          <div class="col-md-7">
            <input type="password" name="pE" id="pE" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="nivelE" class="col-md-5 labeles">Nivel de Privilegio:</label>
          <div class="col-md-7">
            <select class="form-control" name="nivelE" id="nivelE">
              <option value="Administrador">Administrador</option>
              <option value="Normal">Normal</option>
            </select>
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

<!--Modal para eliminar Usuario -->
<div class="modal fade" id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="eliminarUsuarioLabel">Eliminando a: <b id="eliminando">Nombre</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.usuarios.destroy', $usu->id], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="idEliminar" value="" id="idEliminar">
        <label for="">Seguro que desea eliminar este registro?</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="button" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script>
  var formulario;
  var tr;
    $(document).ready(function(){
      $(".btnEdit").on('click', function(){
        var n = $(this).data('nombre');
        var a = $(this).data('asociacion');
        var e = $(this).data('email');
        var id = $(this).data('id');
        var niv = $(this).data('nivel');

        $("#idEditar").val(id);
        $("#nombreE").val(n);
        $("#asociacionE").val(a);
        $("#emailE").val(e);
        $('#nivelE').val(niv);
        $('#editando').text(n);
      });
      $(".btnDelete").on('click', function(){
        var n = $(this).data('nombre');
        var id = $(this).data('id');

        $("#idEliminar").val(id);
        $('#eliminando').text(n);
      });
      $("#txtConfirmar").on('keyup', function(){
        var pass = $('#txtPass').val();
        var conf = $(this).val();

        if(pass != conf){
          $('#lblError').text('Las Contraseñas no coinciden');
        }else{
          $('#lblError').text('');
        }
      });

      $('#txtBusqueda').on('keyup', function(){
        $.ajax({
          method:'POST',
          headers: {'X-CSRF-TOKEN': $('#token').val()},
          url: '/admin/usuarios/buscar',
          data: {
            nombre: $('#txtBusqueda').val()
          },
          beforeSend: function(){
            console.log("Cargando");
          }
        }).done(function(respuesta){
          var arreglo = JSON.parse(respuesta);
          $('#tbody').find('tr').remove();
          for(var x=0;x<arreglo.length;x++){
            var todo = "<tr>";
            todo +=  "<td><center>"+arreglo[x].id+"</center></td>";
            todo +=  "<td><center><img src='../img/logo_asociacion/"+arreglo[x].logo+"' alt='' class='imgperfil'></center></td>";
            todo +=  "<td>"+arreglo[x].nombre+"</td>";
            todo +=  "<td>"+arreglo[x].name+"</td>";
            todo +=  "<td>"+arreglo[x].privilegios+"</td>";
            todo +=  "<td>"+arreglo[x].email+"</td>";
            todo +=  "<td><center>";
            todo +=  "<button ";
            todo +=  "type='button'";
            todo +=  "name='button'";
            todo +=  "data-toggle='modal'";
            todo +=  "data-target='#editarUsuario'";
            todo +=  "data-whatever='@mdo'";
            todo +=  "class='btn btnEdit'";
            todo +=  "data-id='"+arreglo[x].id+"'";
            todo +=  "data-nombre='"+arreglo[x].name+"'";
            todo +=  "data-email='"+arreglo[x].email+"'";
            todo +=  "data-asociacion='"+arreglo[x].nombre+"'";
            todo +=  "data-nivel='"+arreglo[x].privilegios+"'>";
            todo +=  "<i class='fas fa-edit'></i>";
            todo +=  "</button>";
            todo +=  "</center></td>";
            todo +=  "<td><center>";
            todo +=  "<button ";
            todo +=  "id='btnEliminar'";
            todo +=  "type='button'";
            todo +=  "class='btn btn-danger btnDelete'";
            todo +=  "data-toggle='modal'";
            todo +=  "data-target='#eliminarUsuario'";
            todo +=  "data-whatever='@mdo'";
            todo +=  "data-nombre='"+arreglo[x].name+"'";
            todo +=  "data-id='"+arreglo[x].id+"'>";
            todo +=  "<i class='fas fa-times'></i>";
            todo +=  "</button>";
            todo +=  "</center></td>";
            todo +=  "</tr>";
            $('#tbody').append(todo);
          }
          console.log(arreglo);
        });
      });
    });
  </script>
@endsection
