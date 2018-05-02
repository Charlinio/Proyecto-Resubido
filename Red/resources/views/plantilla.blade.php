@extends('/includes/principal')
@section('titulo')
Inicio
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
  <h5><i class="fas fa-home"></i> Inicio</h5>
</div>
@if( Auth::user()->privilegios == 'Administrador')
  <div class="recientes">
    <h4>Actividad Reciente</h4>
    <table class="table table-dark">
      <thead class="tablactividades">
        <tr>
          <td>#</td>
          <td>Fecha</td>
          <td>Actividad</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>24/02/2018</td>
          <td>Se creó convocatoria</td>
        </tr>
        <tr>
          <td>2</td>
          <td>24/02/2018</td>
          <td>Cambios en el estado financiero</td>
        </tr>
        <tr>
          <td>3</td>
          <td>25/02/2018</td>
          <td>Publicación de evento</td>
        </tr>
      </tbody>
    </table>
    <div class="col-md-offset-10">
      <a href="#">Ver todas las actividades</a>
    </div>

  </div>
  @endif
  <div class="col-md-12 cuotas">
    <h4>Estado Financiero</h4>
    <canvas id="myChart" width="200" height="50"></canvas>
  </div>
  <div class="col-md-12 estadofin">
    <h4>Cuotas 2018</h4>
    <table class="table table-dark">
      <thead class="cuots">
        <tr>
          <td>Organizacion</td>
          <td>Enero</td>
          <td>Febrero</td>
          <td>Marzo</td>
          <td>Abril</td>
          <td>Mayo</td>
          <td>Junio</td>
          <td>Julio</td>
          <td>Agosto</td>
          <td>Septiembre</td>
          <td>Ocubre</td>
          <td>Noviembre</td>
          <td>Diciembre</td>
          <td>Adeudo</td>
        </tr>
      </thead>
      <tbody>
        @forelse($cuotas as $cuot)
        <tr>
          <td>{{ $cuot->nombre }}</td>
          <td class="Enero" data-idcuot="{{ $cuot->id_cuota }}">
            @if( $cuot->enero == null && 1 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="1" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->enero >= 50)
                <span style="color:green;font-weight:bold;">{{$cuot->enero}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->enero}}</span>
              @endif
            @endif
          </td>
          <td class="Febrero">
            @if( $cuot->febrero == null && 2 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="2" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->febrero >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->febrero}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->febrero}}</span>
              @endif
            @endif
          </td>
          <td class="Marzo">
            @if( $cuot->marzo == null && 3 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="3" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->marzo >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->marzo}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->marzo}}</span>
              @endif
            @endif
          </td>
          <td class="Abril">
            @if( $cuot->abril == null && 4 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="4" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->abril >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->abril}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->abril}}</span>
              @endif
            @endif
          </td>
          <td class="Mayo">
            @if( $cuot->mayo == null && 5 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="5" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->mayo >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->mayo}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->mayo}}</span>
              @endif
            @endif
          </td>
          <td class="Junio">
            @if( $cuot->junio == null && 6 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="6" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->junio >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->junio}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->junio}}</span>
              @endif
            @endif
          </td>
          <td class="Julio">
            @if( $cuot->julio == null && 7 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="7" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->julio >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->julio}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->julio}}</span>
              @endif
            @endif
          </td>
          <td class="Agosto">
            @if( $cuot->agosto == null && 8 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="8" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->agosto >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->agosto}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->agosto}}</span>
              @endif
            @endif
          </td>
          <td class="Septiembre">
            @if( $cuot->septiembre == null && 9 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="9" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->septiembre >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->septiembre}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->septiembre}}</span>
              @endif
            @endif
          </td>
          <td class="Octubre">
            @if( $cuot->octubre == null && 10 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="10" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->octubre >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->octubre}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->octubre}}</span>
              @endif
            @endif
          </td>
          <td class="Noviembre">
            @if( $cuot->noviembre == null && 11 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="11" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->noviembre >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->noviembre}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->noviembre}}</span>
              @endif
            @endif
          </td>
          <td class="Diciembre">
            @if( $cuot->diciembre == null && 12 <= $messhoy )
              <span style="color:red;font-weight:bold;">0.00</span>
              <input type="hidden" name="diames" value="12" class="meses" data-idcuot="{{ $cuot->id_cuota }}">
            @else
              @if($cuot->diciembre >=50)
                <span style="color:green;font-weight:bold;">{{$cuot->diciembre}}</span>
              @else
                <span style="color:red;font-weight:bold;">{{$cuot->diciembre}}</span>
              @endif
            @endif
          </td>
          <td class="Adeudo">
            @if( $cuot->adeudo == 0)
              <span style="color:green;font-weight:bold;">{{ $cuot->adeudo }}</span></td>
            @else
              <span style="color:red;font-weight:bold;">{{ $cuot->adeudo }}</span></td>
            @endif
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Modal para CONVOCATORIA-->
  <div class="modal fade" id="realizarConvocatoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Convocatoria</h4>
        </div>
        <div class="modal-body">
          <form class="row">
            <div class="row nuevaconvocatoria">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Fecha de creación</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Referencia</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">Tipo de Sesión</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Lugar</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Hora</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
              </div>
            </div>
          <br>
          <div class="col-md-12 nuevaconvocatoria">
            <label for="recipient-name" class="control-label">Orden del día</label>
            <div class="form-horizontal row">
              <label for="recipient-name" class="control-label col-md-1">I.</label>
              <div class="col-md-11">
                <input type="text" class="form-control" id="recipient-name" value="Lista de asistencia y verificación de quórum.">
              </div>
            </div>
            <br>
            <div class="form-horizontal row">
              <label for="recipient-name" class="control-label col-md-1">II.</label>
              <div class="col-md-11">
                <input type="text" class="form-control" id="recipient-name" value="Revisión y aprobación del Orden del día.">
              </div>
            </div>
            <br>
            <div class="form-horizontal row">
              <label for="recipient-name" class="control-label col-md-1">III.</label>
              <div class="col-md-11">
                <input type="text" class="form-control" id="recipient-name" value="Revisión y aprobación del Acta anterior.">
              </div>
            </div>
            <br>
            <div class="form-horizontal row">
              <label for="recipient-name" class="control-label col-md-1">IV.</label>
              <div class="col-md-11">
                <input type="text" class="form-control" id="recipient-name" value="Informe Financiero RIBS.">
              </div>
            </div>
            <br>
            <button type="button" class="btn btn-primary">+</button>
            <button type="button" class="btn btn-primary">-</button>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="../js/Chart.min.js"></script>
  <script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: [{!! $meses !!}],
          datasets: [{
              label: "Saldo",
              backgroundColor: '#fff',
              borderColor: '#3A5787',
              data: [{!! $valores !!}],
          }]
      },

      // Configuration options go here
      options: {}
  });
  </script>
@endsection
