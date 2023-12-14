<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//controlador del login 

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    //validando datos
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Error de autenticacion');
        }

        return redirect(route('login.index'));
    }
}
