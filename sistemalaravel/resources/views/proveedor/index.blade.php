@extends('layouts.layout_admin')
@section('content')

<h1 class="text-center">Lista de proveedores</h1>

<div class="espacio"></div>

<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Dirección</th>
   <th scope="col">Teléfono</th>
   <th scope="col">Fecha registro</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
    @if($proveedores->count())  
    @foreach($proveedores as $proveedor)  
    <tr>
      <td>{{$proveedor->nombre}}</td>
      <td>{{$proveedor->direccion}}</td>
      <td>{{$proveedor->telefono}}</td>
      <td>{{date('d/m/Y', strtotime($proveedor->fecha_registro))}}</td>
      <td>  
        <a class="btn btn-info btn-xs" href="{{action('ProveedorController@edit', $proveedor->id)}}" >Editar</a>
        <a class="btn btn-danger btn-xs" href="{{action('ProveedorController@confirm', $proveedor->id)}}" >Borrar</a>
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
  <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar nuevo proveedor</a>
</div>

{{ $proveedores->links() }}
 
@endsection