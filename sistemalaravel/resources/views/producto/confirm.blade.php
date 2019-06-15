@extends('layouts.layout_admin')
@section('content')

<div class="jumbotron">
    <form method="post" role="form" id="productoForm" action="{{action('ProductoController@destroy', $producto->id)}}">
        <fieldset>
        	{{csrf_field()}}
        	<input name="_method" type="hidden" value="DELETE">
            <div class="text-center">
                <h1 class="display-3">Eliminacíon</h1>
                <p class="lead">¿Estás seguro que deseas eliminar el producto {{$producto->nombre}} ?</p>
                <p class="lead">
                    <button type="submit" name="borrar_producto" class="btn btn-danger boton-largo">Borrar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-info boton-largo">Atrás</a>
                </p>
            </div>
        </fieldset>
    </form>
</div>

@endsection