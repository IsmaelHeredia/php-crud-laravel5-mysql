@extends('layouts.layout_admin')
@section('content')

<h1 class="text-center">Lista de usuarios</h1>

<div class="espacio"></div>

<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Email</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
    @if($usuarios->count())  
    @foreach($usuarios as $usuario)  
    <tr>
      <td>{{$usuario->name}}</td>
      <td>{{$usuario->email}}</td>
      <td>  
        <a class="btn btn-danger btn-xs" href="{{action('UsuarioController@confirm', $usuario->id)}}" >Borrar</a>
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
  <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Agregar nuevo usuario</a>
</div>

{{ $usuarios->links() }}
 
@endsection