<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Ficha_cliente as Cliente;

use App\Modelo\Comuna;
use App\Modelo\Region;
use App\Http\Requests\ValidarCreateCliente as CreateClienteRequest;

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
        $regiones = Region::get();
        return view('clientes.create' , compact('regiones')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClienteRequest $request)
    {
        try {
            $c = new Cliente;   
            $c->run = $request->input('run');
            $c->username = $c->run; 
            $c->password = bcrypt('123123');
            $c->nombres = $request->input('nombres');
            $c->apellidos = $request->input('apellidos');
            $c->telefono = $request->input('telefono');
            $c->correo = $request->input('correo');
            $c->id_comuna = $request->input('id_comuna');
            $c->bloqueo = 1;
            $c->activo = 1;
            $c->direccion = $request->input('direccion');
            $c->save();   
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
            

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
        
        $c = Cliente::findOrFail($id);
        return $c;
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gestion($id)
    {
        $c = Cliente::findOrFail($id);
        return $c;
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
