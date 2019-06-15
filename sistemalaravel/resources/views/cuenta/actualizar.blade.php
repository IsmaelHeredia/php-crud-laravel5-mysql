@extends('layouts.layout_admin')
@section('content')

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Actualizar cuenta</div>
    <div class="card-body">
        <div class="card-block">
            <form method="post" class="needs-validation" novalidate="novalidate" role="form" id="actualizarCuentaForm" action="{{ action('CuentaController@actualizarCuenta') }}">
                {{ csrf_field() }}
                <fieldset>
                    <input name="id" type="hidden" value="{{ Auth::user()->id }}">
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-usuario">
                        <label>Usuario</label>
                        <input name="name" type="text" class="form-control" placeholder="Ingrese usuario" value="{{ Auth::user()->name }}" required="required"/>
                        <div class="invalid-feedback">
                            El usuario es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-email">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Ingrese email" value="{{ Auth::user()->email }}" required="required"/>
                        <div class="invalid-feedback">
                            El email es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-clave">
                        <label>Clave</label>
                        <input name="password" type="password" class="form-control" placeholder="Ingrese clave" required="required"/>
                        <div class="invalid-feedback">
                            La clave es requerida
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-clave-confirmacion">
                        <label>Confirmar clave</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Ingrese clave" required="required"/>
                        <div class="invalid-feedback">
                            La confirmación de la clave es requerida
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="lead">
                            <button type="submit" name="guardar_cuenta" id="guardar_cuenta" class="btn btn-primary boton-largo"><i class="fa fa-plus espacio-icono" aria-hidden="true"></i>Guardar</button>
                        </p>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div>
</div>
 
@endsection