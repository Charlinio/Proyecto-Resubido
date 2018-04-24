<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Red Integral de Bienestar Social</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/estilosv2.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">

</head>
<body>
	<!-- Barra de Navegacion -->
	<div id="Inicio"></div>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="barra">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" name="button" class="navbar-toggle" data-toggle="collapse" data-target="#Menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand"><img src="./img/logo4.png"></a>
			</div>

			<div class="collapse navbar-collapse" id="Menu">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#Inicio">Inicio</a></li>
					<li><a href="#Acerca">Acerca de</a></li>
					<li><a href="#Asociaciones">Asociaciones</a></li>
					<li><a href="#Eventos">Eventos</a></li>
					<li><a href="#Contacto">Contacto</a></li>
					<li class="active"><a href="#" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Iniciar Sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Slider -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="./img/RIBS3.png" alt="RIBS">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

	<!-- Inicio
	<div class="fondo2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Red Integral de Bienestar Social</h1>
					<img src="./img/logo4.png" alt="">

				</div>
			</div>

		</div>
	</div>-->
	<!-- Acerca de Nosotros -->
	<div id="Acerca"></div>
	<div class="fondo1">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h4>Acerca de Nosotros</h4>
					<p>
						Somos una Red de Organizaciones Civiles que busca fortalecer el sector filantrópico contribuyendo al bienestar
						social de Nvo. Casas Gdes. y la región.
					</p>
					<br>
					<h4>Historia</h4>
					<p>
						RIBS nace como una iniciativa de las Organizaciones Civiles de Nuevo Casas Grandes,
						asesoradas por el Centro para el Fortalecimiento de la Sociedad Civil iniciando en el año 2006. En
						el año 2008 se retoma la iniciativa de conformar la red y para el año 2009 se realizó la primer
						Expo-Social donde se reúnen un aproximado de 85% de organizaciones civiles, iniciativa privada,
						gobierno y organismos empresariales. En el año 2010 se realizaron reuniones de seguimiento.
						Para el 2011 con el financiamiento de FECHAC se logra implementar programas del CFOCS,
						logrando el proceso de formalización de la red, donde CFOCS apoya con capacitación y
						consultoría para facilitar el trabajo de la red.
					</p>
					<br>
					<h4>Valores Institucionales</h4>
					<p>
						Servicio, Responsabilidad, Respeto, Tolerancia, Empatía, Comunicación, Trabajo en Equipo,
						Honestidad y Justicia.
					</p>
				</div>
				<div class="col-md-6">
					<img src="./img/foto1.jpg" alt="" class="img-responsive">
				</div>
			</div>
		</div>
	</div>

	<!-- Mision y Vision -->
	<div class="fondo1">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<h4>Misión</h4>
					<p>
						Fortalecer el sector filantrópico contribuyendo a elevar el bienestar social de Nuevo Casas Grandes y la región.
					</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<img src="{{asset('img/foto2.jpg')}}" alt="" class="img-responsive">
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<h4>Visión</h4>
					<p>
						Ser una red fortalecida, posicionada y reconocida como ejemplo de unidad, generadora de impacto social.
					</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<img src="./img/foto3.jpg" alt="" class="img-responsive">
				</div>
			</div>
			<div id="Asociaciones"></div>
		</div>
	</div>

	<!-- Asociaciones -->
	<div class="container text-center">
		<h2>ASOCIACIONES</h2>
		<br><br>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logosolo.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Red Integral de Bienestar Social</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/accionesquedejanhuella.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Acciones que dejan huella</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/blaspascal.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Instituto Blas Pascal</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/cambiosdestino.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Fundacion cambiando destinos</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/cefocane.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>CEFOCANEE</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/centrorehabilitacion.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Centro de Rehabilitacion NCG</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/coparmex.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>COPARMEX</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/corazonesazules.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Corazones Azules en Accion</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/cruzroja.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Cruz Roja Mexicana</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/escucharparaelservicio.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Escuchar para el Servicio</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/faceta.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>FACETA Buenaventura</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/fechac.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>FECHAC</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/ficosec.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>FICOSEC</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/institutomujeres.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Instituto Municipal de Mujeres</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/lagaviota.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>La gaviota</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/oneami.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>ONEAMI</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/paquimeitas.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Club de Leones Paquimeitas</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/peepsida.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>PEEPSIDA</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/reto.jpg" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>RETO</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/soloporayudar.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Solo por Ayudar</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
			<div class="col-sm-4 asociacion">
				<div class="col-md-12">
					<img src="./img/logos/voluntariasvicentinas.png" alt="" class="icono">
				</div>
				<div class="col-md-12">
					<h3>Voluntarias Vicentinas</h3>
					<a href="#">Sitio Web</a>
				</div>
			</div>
		</div>
		<div id="Eventos"></div>
	</div>

	<!-- Eventos -->
	<div class="container text-center">
		<h2>EVENTOS</h2>
		<br><br>
		<div class="row">
			<div class="col-sm-6 col-md-4 caja">
				<div class="vermas"></div>
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento1.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 1</h3>
			</div>
			<div class="col-sm-6 col-md-4 caja">
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento2.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 2</h3>
			</div>
			<div class="col-sm-6 col-md-4 caja">
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento3.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 3</h3>
			</div>
			<div class="col-sm-6 col-md-4 caja">
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento4.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 4</h3>
			</div>
			<div class="col-sm-6 col-md-4 caja">
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento5.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 5</h3>
			</div>
			<div class="col-sm-6 col-md-4 caja">
				<div class="caja2">
					<div class="descripcione">Ver</div>
					<img src="./img/evento6.jpg" alt="" class="eventos">
				</div>
				<h3>Titulo del Evento 6</h3>
			</div>
		</div>
	</div>

	<!-- Contacto -->
		<footer class="container-fluid text-center" id="Contacto">
			<div class="row">
				<div class="col-sm-4">
					<h3>Contáctanos</h3>
					<br>
					<h5><b>Dirección:</b></h5>
					<h5>Calle Pablo VI 1430 Fracc. Juan Pablo II Nuevo Casas Grandes</h5>
					<h5><b>Teléfono:</b> CAMBIAR</h5>
					<h5><b>Correo Electrónico:</b> laredncg@gmail.com</h5>
				</div>
				<div class="col-sm-4">
					<h3>Redes Sociales</h3>
					<a href="https://www.facebook.com/pg/RIBSNCG/about/?ref=page_internal" class="redes"><i class="fab fa-facebook fa-5x"></i></a>
					<h5><span class="fab fa-facebook-messenger"></span>  @RIBSNCG</h5>
				</div>
				<div class="col-sm-4">
					<img src="./img/logosolo3.png" alt="" class="icono">
					<h5>Red Integral de Bienestar Social (RIBS)</h5>
					<h5>Organización no gubernamental (ONG)</h5>
				</div>
			</div>
		</footer>

		<!--1er modal para regisrar LOGIN-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h4>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="{{ route('login') }}">
		            @csrf

		            <div class="form-group row">
		                <label for="email" class="col-sm-4 col-form-label text-md-right">Correo Electronico</label>

		                <div class="col-md-6">
		                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

		                    @if ($errors->has('email'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('email') }}</strong>
		                        </span>
		                    @endif
		                </div>
		            </div>

		            <div class="form-group row">
		                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

		                <div class="col-md-6">
		                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

		                    @if ($errors->has('password'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('password') }}</strong>
		                        </span>
		                    @endif
		                </div>
		            </div>

		            <div class="form-group row">
		                <div class="col-md-6 offset-md-4">
		                    <div class="checkbox">
		                        <label>
		                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
		                        </label>
		                    </div>
		                </div>
		            </div>

		            <div class="form-group row mb-0">
		                <div class="modal-footer">
		                    <button type="submit" class="btn btn-primary">
		                        Entrar
		                    </button>

		                    <a class="btn btn-link" href="{{ route('password.request') }}">
		                        Olvidaste tu contraseña?
		                    </a>
		                </div>
		            </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

	<script src="./js/smooth-scroll.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script defer src="./js/fontawesome-all.min.js"></script>
	<script src="./js/index.js">

	</script>
</body onscroll="pintarBarra()">
</html>
