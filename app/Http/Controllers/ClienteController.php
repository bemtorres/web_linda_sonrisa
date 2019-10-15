<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Ficha_cliente as Cliente;

use App\Modelo\Comuna;
use App\Http\Requests\ValidarCrearCliente as CreateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comuna = Comuna::get();
        return view('clientes.create' , compact('comuna')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClienteRequest $request)
    {
        $c = new Cliente;   
        $c->run = $request->input('run');
        $c->username = $c->run; 
        $c->password = bcrypt('123123');
        $c->nombres = $request->input('nombres');
        $c->apellidos = $request->input('apellidos');
        $c->telefono = $request->input('telefono');
        $c->correo = $request->input('correo');
        $c->id_comuna = $request->input('id_comuna');
        $c->bloqueo = 0;
        $c->activo = 1;
        $c->direccion = $request->input('direccion');
        $c->save();       

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function gestion($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
