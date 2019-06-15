@extends('layouts.layout_admin')
@section('content')

<div class="jumbotron">
    <form method="post" role="form" id="usuarioForm" action="{{action('UsuarioController@destroy', $usuario->id)}}">
        <fieldset>
        	{{csrf_field()}}
        	<input name="_method" type="hidden" value="DELETE">
            <div class="text-center">
                <h1 class="display-3">Eliminacíon</h1>
                <p class="lead">¿Estás seguro que deseas eliminar al usuario {{$usuario->name}} ?</p>
                <p class="lead">
                    <button type="submit" name="borrar_usuario" class="btn btn-danger boton-largo">Borrar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-info boton-largo">Atrás</a>
                </p>
            </div>
        </fieldset>
    </form>
</div>

@endsection