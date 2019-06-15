@extends('layouts.layout_admin')
@section('content')

	<div class="card card-primary contenedor">
	    <div class="card-header bg-primary">Editando al proveedor {{ $proveedor->nombre }}</div>
	    <div class="card-body">
	        <div class="card-block">
	            <form method="POST" action="{{ route('proveedores.update',$proveedor->id) }}"  role="form">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PATCH">
	                <fieldset>
	                    <legend class="text-center">Datos</legend>
	                    <div class="form-group row" name="form-group-nombre">
	                        <label>Nombre</label>
	                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required" value="{{$proveedor->nombre}}"/>
	                        <div class="invalid-feedback">
	                            El nombre es requerido
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-direccion">
	                        <label>Dirección</label>
	                        <input name="direccion" type="text" class="form-control" placeholder="Ingrese dirección" required="required" value="{{$proveedor->direccion}}"/>
	                        <div class="invalid-feedback">
	                            La dirección es requerida
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-telefono">
	                        <label>Teléfono</label>
	                        <input name="telefono" type="text" class="form-control" placeholder="Ingrese teléfono" required="required" value="{{$proveedor->telefono}}"/>
	                        <div class="invalid-feedback">
	                            El teléfono es requerido
	                        </div>
	                    </div>
	                    <div class="text-center">
	                        <p class="lead">
				    			<input type="submit"  value="Actualizar" class="btn btn-success">
				    			<a href="{{ route('proveedores.index') }}" class="btn btn-info">Atrás</a>
	                        </p>
	                    </div>
	                </fieldset>
	            </form> 
	        </div>
	    </div>

@endsection