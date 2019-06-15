@extends('layouts.layout_admin')
@section('content')

	<div class="card card-primary contenedor">
	    <div class="card-header bg-primary">Agregar producto</div>
	    <div class="card-body">
	        <div class="card-block">
	            <form method="POST" action="{{ route('productos.store') }}"  role="form">
				{{ csrf_field() }}
	                <fieldset>
	                    <legend class="text-center">Datos</legend>
	                    <div class="form-group row" name="form-group-nombre">
	                        <label>Nombre</label>
	                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required"/>
	                        <div class="invalid-feedback">
	                            El nombre es requerido
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-descripcion">
	                        <label>Descripción</label>
	                        <input name="descripcion" type="text" class="form-control" placeholder="Ingrese descripción" required="required"/>
	                        <div class="invalid-feedback">
	                            La descripción es requerida
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-precio">
	                        <label>Precio</label>
	                        <input name="precio" type="text" class="form-control" placeholder="Ingrese precio" required="required"/>
	                        <div class="invalid-feedback">
	                            El precio es requerido
	                        </div>
	                    </div>
	                    <div class="form-group row" name="form-group-proveedor">
	                        <label>Proveedor</label>
	                        <select class="form-control" name="proveedor_id" required="required">
	                            @foreach($proveedores as $proveedor)
	                                <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
	                            @endforeach
	                        </select>
	                    </div>	                    
	                    <div class="text-center">
	                        <p class="lead">
				    			<input type="submit"  value="Guardar" class="btn btn-success">
				    			<a href="{{ route('productos.index') }}" class="btn btn-info">Atrás</a>
	                        </p>
	                    </div>
	                </fieldset>
	            </form> 
	        </div>
	    </div>

@endsection