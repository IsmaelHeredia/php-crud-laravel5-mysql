@extends('layouts.layout_admin')
@section('content')

	<div class="card card-primary contenedor">
	    <div class="card-header bg-primary">Editando al producto {{$producto->nombre}}</div>
	    <div class="card-body">
	        <div class="card-block">
	            <form method="POST" action="{{ route('productos.update',$producto->id) }}"  role="form">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
	                <fieldset>
	                    <legend class="text-center">Datos</legend>
	                    <div class="form-group row" name="form-group-nombre">
	                        <label>Nombre</label>
	                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required" value="{{$producto->nombre}}"/>
	                        <div class="invalid-feedback">
	                            El nombre es requerido
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-descripcion">
	                        <label>Descripción</label>
	                        <input name="descripcion" type="text" class="form-control" placeholder="Ingrese descripción" required="required" value="{{$producto->descripcion}}"/>
	                        <div class="invalid-feedback">
	                            La descripción es requerida
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-precio">
	                        <label>Precio</label>
	                        <input name="precio" type="text" class="form-control" placeholder="Ingrese precio" required="required" value="{{$producto->precio}}"/>
	                        <div class="invalid-feedback">
	                            El precio es requerido
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-proveedor">
	                        <label>Proveedor</label>
	                        <select class="form-control" name="proveedor_id" required="required">
	                            @foreach($proveedores as $proveedor)
	                            	@if($proveedor->id == $producto->proveedor_id)
	                                	<option value="{{$proveedor->id}}" selected="selected">{{$proveedor->nombre}}
	                                </option>
	                                @else
	                                	<option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>	
	                                @endif
	                            @endforeach
	                        </select>
	                    </div>
	                    <div class="text-center">
	                        <p class="lead">
				    			<input type="submit"  value="Actualizar" class="btn btn-success">
				    			<a href="{{ route('productos.index') }}" class="btn btn-info">Atrás</a>
	                        </p>
	                    </div>
	                </fieldset>
	            </form> 
	        </div>
	    </div>

@endsection