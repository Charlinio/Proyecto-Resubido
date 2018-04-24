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
  <h2>REPORTITOS</h2>
  <canvas id="myChart" width="400" height="200"></canvas>
@endsection

@section('scripts')
<script src="{{asset('/js/Chart.bundle.min.js')}}"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ["America", "Necaxa", "Cruz Azul", "Santos", "Chivas", "Xolos"],
      datasets: [{
          label: '{{$nombre}}',
          data: [25, 15, 14, 27, 24, 32],
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
      }]
  },
  options: {
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true
              }
          }]
      }
  }
});
</script>
@endsection
