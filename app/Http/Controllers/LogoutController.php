<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
       // dd("Cerro bien pendeje");
       auth()->logout();
       return redirect()->route('login');
    }
}
