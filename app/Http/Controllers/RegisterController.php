<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    //registrando y validando datos

    public function store(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required| unique:users',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('login.index');
    }
}

