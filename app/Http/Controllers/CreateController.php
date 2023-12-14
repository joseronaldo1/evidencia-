<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//controlador para retornar la vista principal 
class CreateController extends Controller
{
    //
    public function index()
    {
        return view('cliente.create');
    }
};
