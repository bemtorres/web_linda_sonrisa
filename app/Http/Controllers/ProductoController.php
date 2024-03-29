<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Producto;
use App\Modelo\Tipo_producto as Tipo;
use App\Modelo\Familia;
use App\Http\Requests\ValidarCreateProducto as ProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get(); 
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::get();
        $familias = Familia::get();
        return view('productos.create',compact('tipos','familias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $p = new Producto();
            $p->nombre_producto = $request->input('nombre_producto');
            $p->descripcion = $request->input('descripcion');
            $p->id_familia = $request->input('id_familia');
            $p->id_tipo_producto = $request->input('id_tipo_producto');
            $p->stock = $request->input('stock');
            $p->stock_critico = $request->input('stock_critico');
            $p->bloqueo = 0;
            $p->activo = 1;
            $p->save();
            return redirect()->route('producto.index');
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

    public function buscarProducto($id)
    {
        try {
            //code...
            $p = Producto::findOrFail($id);
            return $p;
        } catch (\Throwable $th) {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
        }
                  
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Producto::findOrFail($id);
        $tipos = Tipo::get();
        $familias = Familia::get();
        return view('productos.edit',compact('tipos','familias','p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        // return $request;
        try {
            $p = Producto::findOrFail($id);
            $p->nombre_producto = $request->input('nombre_producto');
            $p->descripcion = $request->input('descripcion');
            $p->id_familia = $request->input('id_familia');
            $p->id_tipo_producto = $request->input('id_tipo_producto');
            $p->stock = $request->input('stock');
            $p->stock_critico = $request->input('stock_critico');
            $p->update();
            // return redirect()->route('producto.edit',$id);
            return back()->with('success',"Se ha actualizado"); 
        } catch (\Throwable $th) {
            return back()->with('info',"Error intente nuevamente"); 
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
        //
    }
}
