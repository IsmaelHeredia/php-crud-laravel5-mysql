<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\User;

class CuentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.custom');
    }

    public function cargarActualizarCuenta(User $user)
    {
        $user = Auth::user();
    	return view('cuenta.actualizar',compact('user'))->with('titulo','Cuenta');
    }

    public function actualizarCuenta(User $user)
    {

        $id = request('id');

        $this->validate(request(), [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required|confirmed'
        ]);

        $name = request('name');
        $email = request('email');
        $password = request('password');

        $user = User::find($id);

        if(isset($name)) {
            $user->name = $name;
        }

        if(isset($email)) {
            $user->email = $email;
        }
        
        if(isset($password)) {
            $user->password = $password;
        }

        $user->save();

        return redirect('administracion')->with('success','Los datos de la cuenta fueron actualizados');
    }
}
