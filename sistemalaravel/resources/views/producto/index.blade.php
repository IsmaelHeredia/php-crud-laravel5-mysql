@extends('layouts.layout_admin')
@section('content')

<h1 class="text-center">Lista de productos</h1>

<div class="espacio"></div>

<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Descripción</th>
   <th scope="col">Precio</th>
   <th scope="col">Proveedor</th>
   <th scope="col">Fecha registro</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
    @if($productos->count())  
    @foreach($productos as $producto)  
    <tr>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->descripcion}}</td>
      <td>${{$producto->precio}}</td>
      <td>{{$producto->proveedor->nombre}}</td>
      <td>{{date('d/m/Y', strtotime($producto->fecha_registro))}}</td>
      <td>
        <a class="btn btn-info btn-xs" href="{{action('ProductoController@edit', $producto->id)}}" >Editar</a>
        <a class="btn btn-danger btn-xs" href="{{action('ProductoController@confirm', $producto->id)}}" >Borrar</a>
      </td>
     </tr>
     @endforeach 
     @else
     <tr>
      <td colspan="8">No hay registros !!</td>
    </tr>
    @endif
  </tbody>
</table>

<div class="col text-center">
  <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar nuevo producto</a>
</div>

{{ $productos->links() }}
 
@endsection