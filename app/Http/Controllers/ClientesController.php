<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use GuzzletHttp\User;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    
    public function __construct() {
        $this -> middleware('auth');
    }

    public function index(){
        $clientes = Clientes::all();
        return view('cliente.dashboard', compact('clientes'));
    }

    public function create(){

    }

    public function store (Request $request) {

        $this -> validate($request,[
            'name' => 'required',
            'cedula' => 'required| unique:clientes',
            'direccion' => 'required',
            'telefono' => 'required| unique:clientes',
        ]);

        $clientes = new Clientes();
        $clientes -> name =$request->input('name');
        $clientes -> cedula =$request->input('cedula');
        $clientes -> direccion =$request->input('direccion');
        $clientes -> telefono =$request->input('telefono');
        $clientes->save();
        return redirect(route('login.index'));
    }

    public function show(Clientes $clientes){

    }

    public function edit($id){
        $cliente = Clientes::find($id);
        return view('cliente.editar', ['clientes' => $cliente]);
    }

    public function update(Request $request, $id){
        $this -> validate($request,[
            'name' => 'required',
            'cedula' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $clientes = Clientes::find($id);
        $clientes -> name =$request->input('name');
        $clientes -> cedula =$request->input('cedula');
        $clientes -> direccion =$request->input('direccion');
        $clientes -> telefono =$request->input('telefono');
        $clientes->update();
        return redirect(route('login.index'));
    }
    public function destroy($cedula){
        $clientes =Clientes::find($cedula);
        $clientes->delete();
        return redirect()->back();
    }
}
