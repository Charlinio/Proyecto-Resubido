@extends('includes.principal')
  @section('titulo')
    Actas
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
  <h5><i class="fas fa-book"></i> Actas</h5>
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
  @if(session()->has('duplicado'))
    <div class="alert alert-danger">
      {{ session()->get('duplicado') }}
    </div>
  @endif
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
@if( Auth::user()->privilegios == 'Administrador' )
<div class="col-md-12">
  <div class="col-md-2">
    <p style="margin-bottom:20px;background-color:#434242;padding: 6px 0px;color:#fff;"><b>Convocatorias</b></p>
    <div class="col-md-12" id="convocatoriasPendientes">
      {!! Form::open(array('url' => '/admin/actas/ordendia')) !!}
      @forelse($convocatoriaspendientes as $c)
        @if($resultado != null)
          @for($x = 0;$x<$numero;$x++)
            @if(array_key_exists($x , $resultado))
              @if($c->ref == $resultado[$x])
                <div class="col-md-12">
                  <button type="button" name="button" class="eliminarconvocatoria btneliminarconvocatoria" data-toggle="modal"
                   data-target="#eliminarConvocatoria" data-whatever="@mdo" data-referencia="{{ $c->ref }}">
                    <i class="fas fa-times"></i>
                  </button>
                  <button type="submit" name="button" class="nuevaacta btnVerConvocatoria" style="color:gray;"
                  data-toggle="modal"
                  data-target="#editarConvocatoria"
                  data-whatever="@mdo"
                  data-ref="{{ $c->ref }}"
                  data-fechac="{{ $c->fecha_creacion }}"
                  data-sesion="{{ $c->sesion }}"
                  data-ciudad="{{ $c->ciudad }}"
                  data-lugar="{{ $c->lugar }}"
                  data-hora="{{ $c->hora }}">
                    <i class="fas fa-file fa-5x"></i>
                  </button>
                  <p class="MesConvocatoria" data-mes="{{ $c->ref }}">{{ $c->ref }}</p>
                </div>
              @endif
            @endif
          @endfor
        @endif
      {{ Form::close() }}
      @empty
      @endforelse
      <div class="col-md-12">
        <button type="button" name="button" class="nuevaacta" data-toggle="modal" data-target="#realizarConvocatoria" data-whatever="@mdo" style="color:#E1C363;">
          <i class="fas fa-plus fa-5x"></i>
        </button>
      </div>
    </div>
  </div>
  @endif
  @if( Auth::user()->privilegios == 'Administrador' )
    <div class="col-md-10">
      <p style="margin-bottom:20px;background-color:#434242;padding: 6px 0px;color:#fff;"><b>Actas</b></p>
      <div class="col-md-12" style="margin-bottom:40px;">
        <label for="actaAnio">Año:</label>
        <select class="" name="actaAnio" style="width:200px;height:30px;margin-left:5px;" id="actaAnio">
          <option value="">Todos los Años</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
        </select>
      </div>
  @else
    <div class="col-md-12">
      <p style="margin-bottom:20px;background-color:#434242;padding: 6px 0px;color:#fff;"><b>Actas</b></p>
      <div class="col-md-12" style="margin-bottom:40px;">
        <label for="actaAnio">Año:</label>
        <select class="" name="actaAnio" style="width:200px;height:30px;margin-left:5px;" id="actaAnio">
          <option value="">Todos los Años</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
        </select>
      </div>
  @endif

    <div id="poneractas">
      @forelse($actas as $ac)
        <div class="col-md-2 cajaactas" style="margin-bottom:30px;">
          <button type="button" name="button" class="eliminarconvocatoria btneliminaracta" data-toggle="modal"
           data-target="#eliminarActa" data-whatever="@mdo" data-idacta="{{ $ac->id_acta }}" data-refacta="{{ $ac->ref }}">
            <i class="fas fa-times"></i>
          </button>
          <button type="button" name="button" class="nuevaacta"><i class="fas fa-file-alt fa-5x"></i></button>
          <p data-mesacta="{{ $ac->ref }}" class="mesActa">Enero</p>
          <a href="#">Descargar</a>
        </div>
      @empty
      @endforelse
    </div>
    @if( Auth::user()->privilegios == 'Administrador' )
    <div class="col-md-2">
      <button type="button" name="button" class="nuevaacta" data-toggle="modal" data-target="#registrarActa" data-whatever="@mdo" style="color:#E1C363;">
        <i class="fas fa-plus fa-5x"></i>
      </button>
    @endif
    </div>
  </div>
</div>

<!--Modal de Actas -->
<div class="modal fade" id="registrarActa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registrarActaLabel">Nueva Acta</h4>
      </div>
      <div class="modal-body">

        {!! Form::open(array('route'=>['admin.actas.edit', '$c->ref'], 'method'=>'GET')) !!}
        <div class="input-group col-md-12">
          <label for="referencia">Referencia: </label>

          <select class="form-control" name="referencia" id="referenciaActa">
            <option value="">Seleccionar Referencia</option>
            @forelse($convocatoriaspendientes as $convoca)
              @if($resultado != null)
                @for($x = 0;$x<$numero;$x++)
                  @if(array_key_exists($x , $resultado))
                    @if($convoca->ref == $resultado[$x])
                      <option value="{{ $convoca->ref }}">{{ $convoca->ref }}</option>
                    @endif
                  @endif
                @endfor
              @endif
            @empty
            @endforelse
          </select>
        </div>
        <br>
        <div class="" id="insertarActas"></div>
        <br>
        <br>
        <div class="input-group col-md-12">
          {{ Form::submit('Guardar', array('class' => 'btn btn-primary col-md-12')) }}
        </div>
        <br>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
<!-- Modal para Convocatoria-->
<div class="modal fade" id="realizarConvocatoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Convocatoria</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('url' => '/admin/actas')) }}
          <div class="row nuevaconvocatoria">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fecha_creacion" class="control-label">Fecha de creación</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="">
              </div>
              <div class="form-group">
                <label for="ref" class="control-label">Referencia</label>
                <input type="date" class="form-control" id="ref" name="ref" value="">
              </div>
              <div class="form-group">
                <label for="sesion" class="">Tipo de Sesión</label>
                <select class="form-control" name="sesion">
                  <option value="ORDINARIA">ORDINARIA</option>
                  <option value="EXTRAORDINARIA">EXTRAORDINARIA</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ciudad" class="control-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="Nuevo Casas Grandes">
              </div>
              <div class="form-group">
                <label for="lugar" class="control-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" value="Sala de Juntas FECHAC">
              </div>
              <div class="form-group">
                <label for="hora" class="control-label">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="04:04">
              </div>
            </div>
          </div>
        <br>
        <div class="form-group" id="cajaOrden">
          <label for="recipient-name" class="control-label">Orden del día</label>
          <div class="form-group row" id="orden1">
            <label for="recipient-name" class="control-label col-md-1">1.</label>
            <div class="col-md-11">
              <input type="text" class="form-control" value="Lista de asistencia y verificación de quórum." name="orden1">
            </div>
          </div>
          <div class="form-group row" id="orden2">
            <label for="recipient-name" class="control-label col-md-1">2.</label>
            <div class="col-md-11">
              <input type="text" class="form-control" value="Revisión y aprobación del Orden del día." name="orden2">
            </div>
          </div>
          <div class="form-group row" id="orden3">
            <label for="recipient-name" class="control-label col-md-1">3.</label>
            <div class="col-md-11">
              <input type="text" class="form-control" value="Revisión y aprobación del Acta anterior." name="orden3">
            </div>
          </div>
          <div class="form-group row" id="orden4">
            <label for="recipient-name" class="control-label col-md-1">4.</label>
            <div class="col-md-11">
              <input type="text" class="form-control" value="Informe Financiero RIBS." name="orden4">
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary" id="btnmas">+</button>
        <button type="button" class="btn btn-primary" id="btnmenos">-</button>
        <input type="hidden" name="numerodeordenes" value="4" id="numerodeordenes">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<!-- Modal para Editar Convocatoria-->
<div class="modal fade" id="editarConvocatoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Convocatoria</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('route'=>['admin.actas.edit', ''], 'method'=>'GET')) !!}
          <div class="row nuevaconvocatoria">
            <div class="col-md-6">
              <div class="form-group">
                <label for="fecha_creacion" class="control-label">Fecha de creación</label>
                <input type="date" class="form-control" id="fecha_creacionE" name="fecha_creacionE" value="">
              </div>
              <div class="form-group">
                <label for="ref" class="control-label">Referencia</label>
                <input type="date" class="form-control" id="refE" name="refE" value="">
              </div>
              <div class="form-group">
                <label for="sesion" class="">Tipo de Sesión</label>
                <select class="form-control" name="sesionE" id="sesionE">
                  <option value="ORDINARIA">ORDINARIA</option>
                  <option value="EXTRAORDINARIA">EXTRAORDINARIA</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ciudad" class="control-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudadE" name="ciudadE" value="Nuevo Casas Grandes">
              </div>
              <div class="form-group">
                <label for="lugar" class="control-label">Lugar</label>
                <input type="text" class="form-control" id="lugarE" name="lugarE" value="Sala de Juntas FECHAC">
              </div>
              <div class="form-group">
                <label for="hora" class="control-label">Hora</label>
                <input type="time" class="form-control" id="horaE" name="horaE" value="04:04">
              </div>
            </div>
          </div>
        <br>
        <div class="form-group" id="cajaOrden">
          <label for="recipient-name" class="control-label">Orden del día</label>
          <div class="" id="insertarOrdenes"></div>
        </div>
        <button type="button" class="btn btn-primary" id="btnmas">+</button>
        <button type="button" class="btn btn-primary" id="btnmenos">-</button>
        <input type="hidden" name="numerodeordenes" value="4" id="numerodeordenes">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal para eliminar Convocatoria -->
<div class="modal fade" id="eliminarConvocatoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">Eliminando Convocatoria: <b id="eliminando">Fecha</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.actas.destroy', '1'], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="Caso" value="1">
        <input type="hidden" name="referencia" value="" id="referencia">
        <label for="">Seguro que desea eliminar esta Convocatoria?</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="button" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal para eliminar Acta -->
<div class="modal fade" id="eliminarActa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">Eliminando Acta: <b id="eliminando2">Fecha</b></h4>
      </div>
      {!! Form::open(array('route'=>['admin.actas.destroy', $ac->ref], 'method'=>'delete')) !!}
      <div class="modal-body">
        <input type="hidden" name="Caso" value="2">
        <input type="hidden" name="idacta" value="" id="idacta">
        <input type="hidden" name="refereacta" value="" id="refereacta">
        <label for="">Seguro que desea eliminar esta Acta?</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="btna" id="btna" value="7">Eliminar solo Acta</button>
        <button type="submit" class="btn btn-danger" name="btna" id="btnac" value="8">Eliminar Acta y Convocatoria ligada</button>
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
      var numOrden = 4;
      var ordenDia = "";
      $('#btnmas').on('click', function(){
        numOrden++;
        ordenDia += "<div class='form-group row' id='orden"+numOrden+"'>";
        ordenDia += "<label for='recipient-name' class='control-label col-md-1'>"+numOrden+". </label>";
        ordenDia += "<div class='col-md-11'>";
        ordenDia += "<input type='text' class='form-control' id='recipient-name' value='' name='orden"+numOrden+"'>";
        ordenDia += "</div>";
        ordenDia += "</div>";
        $('#cajaOrden').append(ordenDia);
        $('#numerodeordenes').val(numOrden);
        ordenDia = "";
      });

      $('#btnmenos').on('click', function(){
        $("#orden"+numOrden).remove();
        numOrden--;
        $('#numerodeordenes').val(numOrden);
        if (numOrden<0) {
          numOrden = 0;
        }
      });
      $('.MesConvocatoria').each(function(){
        var Convocatoria = $(this).data('mes');
        var mes = Convocatoria.substring(5,7);
        var dd = Convocatoria.substring(8,10);
        var yyyy = Convocatoria.substring(0,4);

        var mm = parseInt(mes);
        var months = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
        $(this).text(dd + " de " + months[mm-1] + " de " + yyyy);
      });

      $('.mesActa').each(function(){
        var acta = $(this).data('mesacta');
        var mes = acta.substring(5,7);
        var dia = acta.substring(8,10);
        var anio = acta.substring(0,4);
        var mm = parseInt(mes);
        var months = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
        $(this).text(dia + " de " + months[mm-1] + " de " +anio);
      });

      $('#btnrealizarconvocatoria').on('click', function(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        var hora = today.getHours();
        var minutos = today.getMinutes();

        if(dd<10){
          dd='0'+dd;
        }
        if(mm<10){
          mm='0'+mm;
        }
        if(hora<10){
          hora='0'+hora;
        }
        if(minutos<10){
          minutos='0'+minutos;
        }
        var time = hora + ":" + minutos;
        var dia = yyyy+'-'+mm+'-'+dd;
        $('#fecha_creacion').val(dia);
        $('#ref').val(dia);
        $('#hora').val(time);

      });

      $('.btnVerConvocatoria').on('click', function(event){
        var ref = $(this).data('ref');
        var fechac = $(this).data('fechac');
        var sesion = $(this).data('sesion');
        var ciudad = $(this).data('ciudad');
        var lugar = $(this).data('lugar');
        var hora = $(this).data('hora');

        $('#refE').val(ref);
        $('#fecha_creacionE').val(fechac);
        $('#sesionE').val(sesion);
        $('#ciudadE').val(ciudad);
        $('#lugarE').val(lugar);
        $('#horaE').val(hora);

        event.preventDefault();
        $.ajax({
          method:'POST',
          headers: {'X-CSRF-TOKEN': $('#token').val()},
          url: '/admin/actas/ordenactas',
          data: {
            ref: ref
          },
          beforeSend: function(){
            $('#insertarOrdenes').append("Cargando..");
          }
        }).done(function(datos){
          $('#insertarOrdenes').empty();
          for (datas in datos){
            var ordenDefinitiva = "";
            ordenDefinitiva += "<div class='form-group row' id='orden"+datos[datas].numeroOrden+"E'>";
            ordenDefinitiva +=  "<label for='recipient-name' class='control-label col-md-1'>"+datos[datas].numeroOrden+". </label>";
            ordenDefinitiva +=  "<div class='col-md-11'>";
            ordenDefinitiva +=    "<input type='text' class='form-control' value='"+datos[datas].orden_dia+"' name='orden"+datos[datas].numeroOrden+"E'>";
            ordenDefinitiva +=  "</div>";
            ordenDefinitiva += "</div>";
            $('#insertarOrdenes').append(ordenDefinitiva);
          }
        });
      });
      $('#referenciaActa').on('change', function(){
        var ref = $(this).val();
        $.ajax({
          method:'POST',
          headers: {'X-CSRF-TOKEN': $('#token').val()},
          url: '/admin/actas/ordenactas',
          data: {
            ref: ref
          },
          beforeSend: function(){
            console.log("Cargando..");
          }
        }).done(function(datos){
          var mesRef = ref.substring(5,7);
          var anioRef = ref.substring(2,4);
          var idActa = "<input type='hidden' name='idActa' value='"+mesRef+"-"+anioRef+"' id='idActa'>";
          $('#insertarActas').empty();
          $('#insertarActas').append(idActa);
          var z = 0;
          for (datas in datos){
            var ordenDefinitiva = "";
            var placeholder = "";
            ordenDefinitiva += "<div class='form-group row' id='orden"+datos[datas].numeroOrden+"A'>";
            ordenDefinitiva +=  "<label for='recipient-name' class='control-label col-md-12'>"+datos[datas].numeroOrden+". "+ datos[datas].orden_dia+"</label>";
            ordenDefinitiva +=  "<div class='col-md-12'>";
            if(datos[datas].numeroOrden == '1'){
              placeholder = "La Lic. Adriana Soto Carmona en su carácter de Presidenta del Consejo Directivo de RIBS declaró legalmente iniciada la sesión conforme a Lista de asistencia (ANEXO I) y aprovechó para desear un Feliz Año Nuevo 2018 a los integrantes de las Asociaciones Civiles que conforman la Red.";
            }else if(datos[datas].numeroOrden == '2'){
              placeholder = "La Lic. Adriana Soto Carmona Presidenta del Consejo presentó para su revisión y aprobación el orden del día, propuesto el día 04 de Enero de 2018 (ANEXO II), el cual se aprueba por unanimidad.";
            }else if(datos[datas].numeroOrden == '3'){
              placeholder = "El acta número 12-17 se dió por aprobada, omitiendo la lectura de acuerdos ya que no se tomó ninguno en dicha sesión, sin embargo, se estará dando seguimiento a los pendientes de otras sesiones por parte del Asistente Administrativo.";
            }else if(datos[datas].numeroOrden == '4'){
              placeholder = "Se dió a conocer el Estado Financiero de la Red, por parte de la Lic. Ma. Eugenia Baca, Tesorera del Consejo Directivo de RIBS con los últimos movimientos realizados hasta el mes de Diciembre:";
            }
            ordenDefinitiva +=    "<textarea class='textoActas' placeholder='Descripción' name='orden"+datos[datas].numeroOrden+"A'>"+placeholder+"</textarea>"
            ordenDefinitiva +=    "<input type='hidden' name='numero"+datos[datas].numeroOrden+"A' value='"+datos[datas].numeroOrden+"'>"
            ordenDefinitiva +=  "</div>";
            ordenDefinitiva += "</div>";
            $('#insertarActas').append(ordenDefinitiva);
            z++;
          }
          var OrdenesDia = "<input type='hidden' name='OrdenesDia' value='"+z+"'>";
          $('#insertarActas').append(OrdenesDia);
        });
      });

      $('#actaAnio').on('change', function(){
        var anio = $(this).val();
        $.ajax({
          method:'POST',
          headers: {'X-CSRF-TOKEN': $('#token').val()},
          url: '/admin/actas/actasanio',
          data: {
            ref: anio
          },
          beforeSend: function(){
            console.log("Cargando..");
          }
        }).done(function(datos){
          $('#poneractas').empty();
          var months = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
          "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
          for (datas in datos){
            var poneractas = "";
            var fecha = datos[datas].ref;
            var dia = fecha.substring(8,10);
            var mes = fecha.substring(5,7);
            var anio = fecha.substring(0,4);
            var mm = parseInt(mes);
            poneractas += "<div class='col-md-2 cajaactas' style='margin-bottom:30px;'>";
            poneractas +=  "<button type='button' name='button' class='eliminarconvocatoria'><i class='fas fa-times'></i></button>";
            poneractas +=   "<button type='button' name='button' class='nuevaacta'><i class='fas fa-file-alt fa-5x'></i></button>";
            poneractas +=   "<p>"+dia+" de " + months[mm-1] +" de "+anio+"</p>";
            poneractas +=   "<a href='#'>Descargar</a>";
            poneractas += "</div>";
            $('#poneractas').append(poneractas);
            console.log(datos[datas].ref);
          }
        });
      });

      $('.btneliminarconvocatoria').on('click', function(){
        var referencia = $(this).data('referencia');
        $('#referencia').val(referencia);
        $('#eliminando').text(referencia);
      });
      $('.btneliminaracta').on('click', function(){
        var id = $(this).data('idacta');
        var refacta = $(this).data('refacta');
        $('#idacta').val(id);
        $('#eliminando2').text(refacta);
        $('#refereacta').val(refacta);
      });


    });
  </script>
@endsection
