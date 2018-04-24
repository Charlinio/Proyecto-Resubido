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
<div class="row">
  <li class="listaconvocatoria">
    <a href="#" type="button" data-toggle="modal" data-target="#realizarConvocatoria" data-whatever="@mdo" class="convocatoriona">
      <i class="fas fa-calendar-alt"></i> Evento +
    </a>
  </li>
  <li class="listaconvocatoria">
    <a href="#" type="button" data-toggle="modal" data-target="#realizarConvocatoria" data-whatever="@mdo" class="convocatoriona">
      <i class="fas fa-book"></i> Acta +
    </a>
  </li>
 <li class="listaconvocatoria">
   <a href="#" type="button" data-toggle="modal" data-target="#realizarConvocatoria" data-whatever="@mdo" class="convocatoriona">
     <i class="fas fa-file"></i> Convocatoria +
   </a>
 </li>
</div>

  <div class="recientes">
    <h4>Actividad Reciente</h4>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Fecha</th>
          <th scope="col">Actividad</th>
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
  <div class="col-md-12 cuotas">
    <h4>Estado Financiero</h4>
    <canvas id="myChart" width="200" height="50"></canvas>
  </div>
  <div class="col-md-12 estadofin">
    <h4>Cuotas 2018</h4>
    <table class="table table-dark">
      <thead class="cuots">
        <tr>
          <th scope="col">Organizacion</th>
          <th scope="col">Enero</th>
          <th scope="col">Febrero</th>
          <th scope="col">Marzo</th>
          <th scope="col">Abril</th>
          <th scope="col">Mayo</th>
          <th scope="col">Junio</th>
          <th scope="col">Julio</th>
          <th scope="col">Agosto</th>
          <th scope="col">Septiembre</th>
          <th scope="col">Ocubre</th>
          <th scope="col">Noviembre</th>
          <th scope="col">Diciembre</th>
          <th scope="col">Adeudo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Celebrando la vida</td>
          <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          <td>0</td>
        </tr>
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
          labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          datasets: [{
              label: "Saldo",
              backgroundColor: '#7FC6A4',
              borderColor: '#7FC6A4',
              data: [0, 10, 5, 2, 20, 30, 45, 42, 50, 51, 52, 60],
          }]
      },

      // Configuration options go here
      options: {}
  });
  </script>
@endsection
