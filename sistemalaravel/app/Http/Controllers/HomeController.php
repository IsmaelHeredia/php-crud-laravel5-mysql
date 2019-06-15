<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
        	return Redirect::to('/administracion');
    	} else {
    		return Redirect::to('/ingreso');
    	}
    }
}
