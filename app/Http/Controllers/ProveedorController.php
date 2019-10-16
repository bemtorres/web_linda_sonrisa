<?php

namespace App\Http\Controllers;

use App\Modelo\Ficha_proveedor as Proveedor;
use Illuminate\Http\Request;

use App\Http\Requests\ValidadCreateProveedor as CreateProveedorRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();        
        return view('proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $p = new Proveedor;        
        $p->username = $request->input('username'); 
        // $p->password = bcrypt('12345');
        $p->password =  hash('sha256', $request->input('password'));
        $p->nombre_empresa = $request->input('nombre_empresa');
        $p->rubro = $request->input('rubro');
        $p->telefono = $request->input('telefono');
        $p->correo = $request->input('correo');
        $p->activo = 1;
        $p->bloqueo = 0;
        $p->save(); 
        return redirect()->route('proveedor.index');
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
        return $id;
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
