@extends('layouts.layout')
@section('content')

<div class="card card-primary ingreso">
    <div class="card-header bg-primary">Ingreso</div>
    <div class="card-body">
        <div class="card-block">
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('mensaje_error') }}
            </div>
            @endif
            {{ Form::open(array('url' => '/ingreso')) }}
                <legend>Iniciar sesión</legend>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('contraseña', 'Contraseña') }}
                    {{ Form::password('clave', array('class' => 'form-control')) }}
                </div>
                <div class="text-center">
                    <p class="lead">
                        {{ Form::submit('Ingresar', array('class' => 'btn btn-primary boton-largo')) }}
                    </p>
                </div>               
            {{ Form::close() }}
        </div>
    </div>
</div>
 
@endsection