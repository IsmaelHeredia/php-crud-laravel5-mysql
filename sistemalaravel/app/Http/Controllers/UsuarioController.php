<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::orderBy('id','ASC')->paginate(10);
        return view('Usuario.index',compact('usuarios'))->with('titulo','Usuarios');
    }

    public function create()
    {
        return view('usuario.create')->with('titulo','Usuarios');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->route('usuarios.index')->with('success','Registro creado exitosamente');
    }

    public function confirm($id)
    {
        $usuario = User::find($id);
        return view('usuario.confirm',compact('usuario'))->with('titulo','Usuarios');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro borrado exitosamente');    
    }
}
