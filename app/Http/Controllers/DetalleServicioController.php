<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Servicio;
use App\Modelo\Detalle_servicio as Detalle;

class DetalleServicioController extends Controller
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
        $d->id_servicio = $request->input('id_servicio');
        $d->id_producto = $request->input('id_producto');
        $d->cantidad = $request->input('cantidad');
        $d->save();
        return redirect()->route('servicio.ver',$d->id_servicio)->with('success','Se ha agregado');
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
        try {
            $d = Detalle::findOrFail($id);
            $d->cantidad = $request->input('cantidad');
            $d->update();
            return back()->with('success',"Se ha eliminado"); 
        } catch (\Throwable $th) {
            return back()->with('info',"No se ha eliminado"); 
        }
       
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

  
}
