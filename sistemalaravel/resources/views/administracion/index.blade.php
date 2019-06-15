@extends('layouts.layout_admin')
@section('content')

<h1 class="text-center">Administración</h1>

<div class="espacio"></div>

<h1 class="text-center">Bienvenido {{ Auth::user()->name }}</h1>
 
@endsection