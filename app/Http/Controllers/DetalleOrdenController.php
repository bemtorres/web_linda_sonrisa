<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Producto;
use App\Modelo\Orden_empleado as Orden;
use App\Modelo\Detalle_orden as Detalle;

class DetalleOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Orden::orderBy('created_at')->get();
        return view('solicitudes.indexs',compact('solicitudes'));
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
        // return $request;
        try {
            if(strlen($request->input('listado')>0)){
                $orden = new Orden();
                $orden->id_empleado = $request->input('id_empleado');
                $orden->codigo = $request->input('codigo_orden');
                $orden->id_ficha_proveedor = $request->input('id_ficha_proveedor');
                $orden->enviado = 0;
                $orden->save();
    
                $listado = $request->input('listado');
                // return $listado;
    
                foreach ($listado as $l) {
                    $n = "cantidad" . $l;
                    $cantidad = $request->input($n);
                    $detalle = new Detalle();
                    $detalle->id_orden_empleado = $orden->id_orden_empleado;
                    $detalle->id_producto = (int)$l;
                    $detalle->cantidad = (int)$cantidad;
                    $detalle->save();            
                }
    
                return back()->with('success','Se ha generado la orden código ' . $orden->codigo . "."); 
            }else{
                return back()->with('info','Error intente nuevamente.'); 
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
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
