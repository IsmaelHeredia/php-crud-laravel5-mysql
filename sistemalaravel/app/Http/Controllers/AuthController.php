<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {

    public function showLogin()
    {
        if (Auth::check())
        {
            return Redirect::to('/');
        }
        return View::make('ingreso.index');
    }

    public function postLogin()
    {
        $userdata = array(
            'email' => Input::get('email'),
            'password'=> Input::get('clave')
        );

        if(Auth::attempt($userdata))
        {
            return Redirect::to('/administracion');
        }

        return Redirect::to('ingreso')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('/ingreso')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
    
}