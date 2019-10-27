<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Servicio;
use App\Modelo\Detalle_servicio as Detalle;
use App\Modelo\Producto;
use App\Http\Requests\ValidarCreateServicio as ServicioRequest;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::get(); 
        return view('servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        try {
            $s = new Servicio();
            $s->nombre_servicio = $request->input('nombre_servicio');
            $s->mostrar = 1;
            $s->save();
            return redirect()->route('servicio.index');
        } catch (\Throwable $th) {
            return back()->with('info',$th); 
        }
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
    public function update(ServicioRequest $request, $id)
    {
        try {
            $s = Servicio::findOrFail($id);
            $s->nombre_servicio = $request->input('nombre_servicio');
            $s->mostrar = $request->input('mostrar');
            $s->update();
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
    
        return redirect()->route('servicio.index');
    }

    public function mostrar($id)
    {
        try {
            $s = Servicio::findOrFail($id);
            if($s->mostrar==1){
                $s->mostrar = 0;
            }else{
                $s->mostrar = 1;
            }
            $s->update();
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
        
        return redirect()->route('servicio.index');
    }

    public function verServicios($id)
    {
        try {
            $servicio = Servicio::findOrFail($id);
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
                
        return view('servicios.detalles.index',compact('servicio'));
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
