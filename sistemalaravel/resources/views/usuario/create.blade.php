@extends('layouts.layout_admin')
@section('content')

  <div class="card card-primary contenedor">
      <div class="card-header bg-primary">Registrar usuario</div>
      <div class="card-body">
          <div class="card-block">
            <form method="POST" action="{{ route('usuarios.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Clave:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <p class="lead">
                      <input type="submit"  value="Guardar" class="btn btn-success">
                      <a href="{{ route('usuarios.index') }}" class="btn btn-info">Atrás</a>
                    </p>
                </div>
            </form>
          </div>
      </div>
 
@endsection