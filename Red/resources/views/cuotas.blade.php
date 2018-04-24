@extends('/includes/principal')
@section('titulo')
Cuotas
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
  <h5><i class="fas fa-dollar-sign"></i> Cuotas</h5>
</div>
<div class="col-md-12">
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
  @if(session()->has('saldomal'))
    <div class="alert alert-danger">
      {{ session()->get('saldomal') }}
    </div>
  @endif
</div>
<div class="col-md-9" id="ControlesCuotas">
  <div class="col-md-2 cajacontroles">
    <button id="btnAgregarCuota" type="button" name="button" class="controles" data-toggle="modal" data-target="#registrarCuota" data-whatever="@mdo">
      <i class="fas fa-building"></i>
    </button>
    <p>Agregar Asociacion</p>
  </div>
  <div class="col-md-6 cajacontroles">
    <label for="anio" class="col-md-3 labeles">Año:</label>
    <div class="col-md-7">
      <select class="form-control" name="anio">
        @forelse($anio as $an)
        <option value="{{ $an->anio }}">{{ $an->anio }}</option>
        @empty
        <option value="vacio">Sin Registros</option>
        @endforelse
      </select>
    </div>
    <div class="col-md-2">
      <button id="btnAgregarAnio" class="controltabla" type="button" name="button" data-toggle="modal" data-target="#nuevaTabla" data-whatever="@mdo">
        <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
</div>

<div class="col-md-3 cajacontroles">
  <div class="col-md-6">
      <a href="{{ url('/admin/finanzas') }}" class="linkfinanzas" id="btnCuotas">
        <i class="fas fa-chart-line"></i>
      </a>
      <p>Estado Financiero</p>
  </div>
  <div class="col-md-6">
    <button type="submit" name="button" class="controles {{ Request::is('admin/cuotas') ? 'finanzasActivo' : '' }}" id="btnCuotas">
      <i class="fas fa-table"></i>
    </button>
    <p>Cuotas</p>
  </div>
</div>

<div class="col-md-12">
  <div class="" id="CuotasF">
    <table class="table">
      <thead>
        <tr>
          <td>Organización</td>
          <td id="Enero">Enero</td>
          <td id="Febrero">Febrero</td>
          <td id="Marzo">Marzo</td>
          <td id="Abril">Abril</td>
          <td id="Mayo">Mayo</td>
          <td id="Junio">Junio</td>
          <td id="Julio">Julio</td>
          <td id="Agosto">Agosto</td>
          <td id="Septiembre">Septiembre</td>
          <td id="Octubre">Octubre</td>
          <td id="Noviembre">Noviembre</td>
          <td id="Diciembre">Diciembre</td>
          <td>Adeudo</td>
          <td>Pagar</td>
        </tr>
      </thead>
      <tbody>
        @forelse($cuotas as $cuot)
        <tr>
          <td>{{ $cuot->nombre }}</td>
          <td class="Enero"></td>
          <td class="Febrero"></td>
          <td class="Marzo"></td>
          <td class="Abril"></td>
          <td class="Mayo"></td>
          <td class="Junio"></td>
          <td class="Julio"></td>
          <td class="Agosto"></td>
          <td class="Septiembre"></td>
          <td class="Octubre"></td>
          <td class="Noviembre"></td>
          <td class="Diciembre"></td>
          <td class="Adeudo"></td>
          <td><button
                type="button"
                name="button"
                data-toggle="modal"
                data-target="#registrarCuota"
                data-whatever="@mdo"
                data-id="{{ $cuot->id_cuota }}"
                class="btn btnCuota">
                <i class="fas fa-money-bill-alt"></i>
              </button>
          </td>
        </tr>
        @empty
        <p>No existen Tablas</p>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!--Modal para registrar Cuotas -->
<div class="modal fade" id="registrarCuota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarCuotaLabel">Cuotas</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('route'=>['admin.finanzas.edit', $cuot->organizacion], 'method'=>'GET')) !!}
        <input type="hidden" name="idCuota" value="" id="idCuota">
          <div class="form-group row">
            <label for="meses" class="col-md-3 labeles">Mes:</label>
              <div class="col-md-9">
                <select class="form-control" name="meses" id="meses">
                  <option value="01">Enero</option>
                  <option value="02">Febrero</option>
                  <option value="03">Marzo</option>
                  <option value="04">Abril</option>
                  <option value="05">Mayo</option>
                  <option value="06">Junio</option>
                  <option value="07">Julio</option>
                  <option value="08">Agosto</option>
                  <option value="09">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="cantidadCuota" class="col-md-3 labeles">Cuota:</label>
              <div class="col-md-9">
                <input type="number" name="cantidadCuota" value="" class="form-control">
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
<!--Modal para agregar tabla a  Cuotas -->
<div class="modal fade" id="nuevaTabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="nuevaTablaLabel">Nueva Tabla</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => '/admin/finanzas')) }}
        <input type="hidden" name="Caso" value="3">
        <div class="form-group row">
          <label for="anioTabla" class="col-md-2 labeles">Año:</label>
          <div class="col-md-10">
            <input type="text" name="anioTabla" id="anioTabla" class="form-control">
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
@endsection

@section('scripts')
<script>
  //document.getElementById("fecha_sistema").value = today;
  $(document).ready(function(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
      dd='0'+dd;
    }
    if(mm<10){
      mm='0'+mm;
    }
    var today = yyyy+'-'+mm+'-'+dd;

    function Mes(caso, id){
      if(mm == caso){
        $(id).css('color','red');
      }
    }
    Mes('01','#Enero');
    Mes('02','#Febrero');
    Mes('03','#Marzo');
    Mes('04','#Abril');
    Mes('05','#Mayo');
    Mes('06','#Junio');
    Mes('07','#Julio');
    Mes('08','#Agosto');
    Mes('09','#Septiembre');
    Mes('10','#Octubre');
    Mes('11','#Noviembre');
    Mes('12','#Diciembre');

    $('.Adeudo').text(mm * 50);

    $("#btnNuevoConcepto").on('click', function(){
      $('#fecha_sistema').val(today);
    });
    $('#btnFinanzas').on('click', function(){

    });
    $('#btnCuotas').on('click', function(){

    });
    $('.btnCuota').on('click', function(){
      var id = $(this).data('id');
      $('#idCuota').val(id);
    });
  });
</script>

@endsection
