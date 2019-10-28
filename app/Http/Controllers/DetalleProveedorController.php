<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Modelo\Servicio;
use App\Modelo\Detalle_proveedor as Detalle;
use App\Modelo\Ficha_proveedor as Proveedor;

class DetalleProveedorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Detalle();
        $d->id_ficha_proveedor = $request->input('id_ficha_proveedor');
        $d->id_producto = $request->input('id_producto');
        $d->save();
        return redirect()->route('proveedor.ver',$d->id_ficha_proveedor)->with('success','Se ha agregado');
        // route('servicio.ver', $s->id_servicio)
        // return $request;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $d = Detalle::findOrFail($id)->delete();
            return back()->with('success',"Se ha eliminado"); 
        } catch (\Throwable $th) {
            return back()->with('info',"No se ha eliminado"); 
        }
       
    }

    public function verProductos($id)
    {
        try {
            $proveedor = Proveedor::findOrFail($id);
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
                
        return view('proveedores.detalles.index',compact('proveedor'));
    }

    
}
