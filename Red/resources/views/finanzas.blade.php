@extends('/includes/principal')
@section('titulo')
Finanzas
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
  <h5><i class="fas fa-dollar-sign"></i> Finanzas</h5>
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
<div class="col-md-9" id="ControlesFinanzas">
  <div class="col-md-2 cajacontroles">
    <button id="btnNuevoConcepto" type="button" name="button" class="controles" data-toggle="modal" data-target="#registrarFinanza" data-whatever="@mdo">
      <i class="fas fa-dollar-sign"></i>
    </button>
    <p>Ingreso / Egreso</p>
  </div>
  <div class="col-md-2 cajacontroles">
    <button type="button" name="button" class="controles"><i class="fas fa-chart-bar"></i></button>
    <p>Grafica</p>
  </div>
</div>

<div class="col-md-3 cajacontroles">
  <div class="col-md-6">
    <button type="button" name="button" class="controles {{ Request::is('admin/finanzas') ? 'finanzasActivo' : '' }}" id="btnFinanzas">
      <i class="fas fa-chart-line"></i>
    </button>
    <p>Estado Financiero</p>
  </div>
  <div class="col-md-6">
        <a href="{{ url('/admin/cuotas') }}" class="linkfinanzas" id="btnCuotas">
          <i class="fas fa-table"></i>
        </a>
      <p>Cuotas</p>
  </div>
</div>

<div class="col-md-12">
  <table class="table filafinanza" id="EstadoFinanciero">
    <thead>
      <tr>
        <td>FECHA</td>
        <td>CONCEPTO</td>
        <td>INGRESO</td>
        <td>EGRESO</td>
        <td>SALDO</td>
        <td>ELIMINAR</td>
      </tr>
    </thead>
    <tbody>
      @forelse($estado as $e)
      <tr>
        <td>{{ $e->fecha }}</td>
        <td>{{ $e->concepto}}</td>
        <td style="color:green;"><b>{{ $e->ingreso }}</b></td>
        <td style="color:red;"><b>{{ $e->egreso }}</b></td>
        <td>{{ $e->saldo }}</td>
        <td>
          <button type="button" name="button" class="eliminarfinanza btneliminarfinanza" data-toggle="modal"
           data-target="#eliminarfinanza" data-whatever="@mdo" data-idfinanza="{{ $e->id_finanza }}">
           <i class="fas fa-times"></i>
          </button>
        </td>
      </tr>
      @empty
      <p>Sin registros</p>
      @endforelse
    </tbody>
  </table>
  <br>
</div>

<!--Modal para registrar Ingresos / Egresos -->
<div class="modal fade" id="registrarFinanza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarFinanzaLabel">Ingresos / Egresos</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => '/admin/finanzas')) }}
        <input type="hidden" name="Caso" value="1">
          <div class="form-group row">
            <label for="fecha" class="col-md-3 labeles"><span class="obligatorio">*</span> Fecha: </label>
            <div class="col-md-9">
              <input type="date" name="fecha" value="" class="form-control" id="fecha_sistema">
            </div>
          </div>
          <div class="form-group row">
            <label for="concepto" class="col-md-3 labeles"><span class="obligatorio">*</span> Concepto: </label>
            <div class="col-md-9">
              <input type="text" name="concepto" value="" class="form-control">
            </div>
          </div>
          <br>
          <div class="form-check row">
            <label for="ingreso" class="col-md-3 labeles" style="text-align:right;"><span class="obligatorio">*</span> Ingreso: </label>
            <div class="col-md-1">
              <input type="radio" name="dinero" value="ingresos" class="form-check-input" style="width:25px;height:25px;" checked>
            </div>
            <label for="egreso" class="col-md-3 labeles" style="text-align:right;"><span class="obligatorio">*</span> Egreso: </label>
            <div class="col-md-1">
              <input type="radio" name="dinero" value="egresos" class="form-check-input" style="width:25px;height:25px;">
            </div>
          </div>
          <br>
          <div class="form-group row">
            @if(empty($disponible->toArray()))
            <p><b>Saldo disponible: </b><span style="color:red;font-weight:bold;font-size:1.5rem;">$0.00</span></p>
            @else
            <p><b>Saldo disponible:</b> <span style="color:green;font-weight:bold;font-size:1.5rem;">${{ $disponible[0]->saldo }}</span></p>
            @endif
          </div>
          <div class="form-group row">
              <label for="cantidad" class="col-md-3 labeles"><span class="obligatorio">*</span> Cantidad: </label>
            <div class="col-md-9">
              <input type="number" name="cantidad" value="" class="form-control">
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
<!--Modal para eliminar registro -->
<div class="modal fade" id="eliminarfinanza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">Eliminando registro</h4>
      </div>
      {!! Form::open(array('route'=>['admin.finanzas.destroy', $e->id_finanza], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="idfinanza" value="" id="idfinanza">
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

    $('.Adeudo').text(mm * 50);

    $("#btnNuevoConcepto").on('click', function(){
      $('#fecha_sistema').val(today);
    });

    $('.btneliminarfinanza').on('click', function(){
      var idfinanza = $(this).data('idfinanza');
      $('#idfinanza').val(idfinanza);
    });

  });
</script>

@endsection
