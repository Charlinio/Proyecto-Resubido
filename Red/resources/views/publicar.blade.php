@extends('/includes/principal')
<!-- TITULO -->
@section('titulo')
Publicar
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

<!-- Contenido -->
@section('contenido')
<div class="row titulo">
  <h5><i class="fas fa-share-square"></i> Publicar</h5>
</div>
<div class="col-md-12">
  <div class="col-md-6 col-md-offset-3">
    @forelse($nombreAsociacion as $n)
      <img src="../img/logo_asociacion/{{ $n->logo }}" style="width:50px;height:50px;float:left;margin-right:5px;margin-left:50px;"alt="">
      <p style="text-align:left;line-height:4;">{{ $n->nombre }} ({{ Auth::user()->name }})</p>
    @empty
      <h5>no</h5>
    @endforelse
    {{ Form::open(array('url' => '/admin/publicar')) }}
    <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
    <textarea name="txtpublicar" rows="6" cols="60" placeholder="Publicar" style="padding:5px;"></textarea>
    <br><br>
    <div class="col-md-offset-8">
      <button type="button" name="btnadjuntar">Adjuntar</button>
      <button type="submit" name="btnpublicar">Publicar</button>
    </div>
    {{ Form::close() }}
  </div>
</div>
<div class="col-md-12">
  @forelse($publicaciones as $publicacion)
  <div class="col-md-6 col-md-offset-3 publicacion">
    <img src="../img/logo_asociacion/{{ $publicacion->logo }}" alt="">
    <p class="publico">{{ $publicacion->nombre }} ({{$publicacion->name}}) publicó:</p>
    <p style="text-align: left;">{{ $publicacion->publicacion }}</p>
    <p style="color:gray;text-align:right;" class="fechaPublicacion" data-fecha="{{ $publicacion->created_at }}">{{ $publicacion->created_at }}</p>
  </div>
  @empty
  @endforelse
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $('.fechaPublicacion').each(function(){
      var fecha = $(this).data('fecha');
      var dd = fecha.substring(8,10);
      var mm = fecha.substring(5,7);
      var yyyy = fecha.substring(0,4);
      var months = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
             "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
      var mes = months[mm-1];
      $(this).text(dd + " de " + mes + " de " + yyyy + ":" + " " + fecha.substring(11,fecha.length));
    });
  });
</script>
@endsection
