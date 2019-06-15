<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdministracionController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
        	return View::make('administracion.index');
    	} else {
    		return Redirect::to('/ingreso');
    	}
    }
}
