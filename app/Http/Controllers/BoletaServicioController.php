<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Modelo\Boleta_servicio as Boleta;


class BoletaServicioController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $boletas = Boleta::get();
        return view('boleta_servicio.index',compact('boletas'));
    }

    public function show($id)
    {
        $b = Boleta::findOrFail($id);;
        return view('boleta_servicio.detalles.index',compact('b'));
    }

    public function estadistica(){
        // $r = Boleta::join('detalle_servicio','boleta_servicio.id_servicio','=','detalle_servicio.id_servicio')
        //             ->join('producto','detalle_servicio.id_producto','=','producto.id_producto')
        //             ->select('producto.nombre_producto as nombre')
        //             ->groupBy('producto.nombre_producto')
        //             ->get();

        $pr = DB::Select('SELECT pro.nombre_producto , SUM(deta.cantidad) AS total FROM boleta_servicio bol JOIN detalle_servicio deta ON(bol.id_servicio=deta.id_servicio) JOIN producto pro ON (deta.id_producto=pro.id_producto) GROUP BY pro.nombre_producto');
        return view('boleta_servicio.productos.index',compact('pr'));
        
        // return $r;

        // $detalle = App\Modelo\Detalle_orden::join('producto', 'detalle_orden.id_producto', '=', 'producto.id_producto')
        // ->where('id_orden_empleado',$orden->id_orden_empleado)
        // ->select('producto.id_producto','nombre_producto', 'cantidad as cantidad_solicitada','cantidad_recibida','entregado')->get();

    }
}
