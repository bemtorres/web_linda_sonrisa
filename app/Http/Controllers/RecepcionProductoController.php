<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Orden_empleado as Orden;
use App\Modelo\Detalle_orden as Detalle;
use App\Modelo\Producto;

class RecepcionProductoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $o = Orden::findOrFail($id);
        return view('recepciones.create', compact('o'));
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
            if(strlen($request->input('listado')>0)){
                $o = Orden::findOrFail($id);
                $o->enviado = 2;
                $o->id_empleado_r = $request->input('id_empleado_r');
                $o->update();
        
        
                $listado = $request->input('listado');
                // return $listado;
        
                foreach ($listado as $l) {
                    $n = "cantidad_" . $l;
                    $cantidad = $request->input($n);
                    $detalle =  Detalle::findOrFail($l);
                    $detalle->cantidad_recibida = $cantidad;                    
                    $detalle->entregado = 1;
                    $detalle->update();        
                    $p = Producto::findOrFail($detalle->id_producto);
                    $total = $p->stock + $cantidad;
                    $p->stock = $total;
                    $p->update();      
                }
        
            }
        } catch (\Throwable $th) {
            return $th;
            // return back()->with('info','Error intente nuevamente.'); 
        }
    
        return redirect()->route('ordenpedido.index')->with('success','Se recibido correctamente.');
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
