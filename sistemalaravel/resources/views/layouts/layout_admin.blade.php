<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
	<title>{{ $titulo ?? 'Administración' }}</title>
	<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
	<script src="{{ asset('chart/code/highcharts.js') }}"></script>
	<script src="{{ asset('chart/code/modules/exporting.js') }}"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Administración</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Categorias <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="categorias">
                <a class="dropdown-item" href="{{ url('productos') }}">Productos</a>
                <a class="dropdown-item" href="{{ url('proveedores') }}">Proveedores</a>
                <a class="dropdown-item" href="{{ url('usuarios') }}">Usuarios</a>
              </div>
          </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('estadisticas') }}">Estadísticas</a>
	      </li>
	    </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="cuenta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cuenta">
                	<a class="dropdown-item" href="{{ url('cuenta/actualizar') }}" name="cambiar_usuario">Actualizar cuenta</a>
	                <div class="dropdown-divider"></div>
	                	<a class="dropdown-item" href="{{ url('salir') }}">Salir</a>
	                </div>
            </li>
        </ul>
	  </div>
	</nav>
	<div class="container-fluid" style="margin-top: 50px">
		@if (count($errors) > 0)
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Error!</strong> Revise los campos obligatorios.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		<div class="espacio"></div>
		@endif
		@if(Session::has('success'))
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{Session::get('success')}}
		</div>
		<div class="espacio"></div>
		@endif
		@yield('content')
	</div>
	<div class="main"></div>
	<footer class="footer">
	  <div class="container text-white">
	    <br>
	    <p class="text-center">Copyright Ismael Heredia 2019</p>
	  </div>
	</footer>
</body>
</html>