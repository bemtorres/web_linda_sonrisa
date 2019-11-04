<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Producto;
use App\Modelo\Orden_empleado as Orden;
use App\Modelo\Detalle_orden as Detalle;

class OrdenEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get(); 
        return view('solicitudes.index',compact('productos'));
    }


    public function nueva()
    {
        return view('solicitudes.create');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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



    public function enviar($id)
    {
        try {
            $o = Orden::findOrFail($id);
            $o->enviado = 1;
            $o->update();
            return back()->with('success','Se ha enviado la solicitud código ' . $o->codigo ."." ); 
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
       
        return $o;
    }

    public function code(){
        $code = $this->generarCodigo(5);
        try {
            //code...           
            $o = Orden::where('codigo',$code)->firstOrFail();
            code();
        } catch (\Throwable $th) {
            return $code;
        }        
        
    }

    private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }

    public function buscarProductosPedidoCodigo($id){        
        $listado = Orden::join('detalle_orden', 'orden_empleado.id_orden_empleado', '=', 'detalle_orden.id_orden_empleado')
                        ->join('producto', 'detalle_orden.id_producto', '=', 'producto.id_producto')->where('orden_empleado.codigo',$id)->get();
        return $listado;
    }

}
