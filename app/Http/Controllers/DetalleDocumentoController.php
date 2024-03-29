<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Modelo\Ficha_cliente as Cliente;
use App\Modelo\Documento;
use App\Modelo\Detalle_documento as Detalle;

class DetalleDocumentoController extends Controller
{

    public function index($id_cliente)
    {
        $documentosclientes = Detalle::where('id_ficha_cliente',$id_cliente)->get();
        $documentos = Documento::get();  
        foreach ($documentos as $d) {
            foreach ($documentosclientes as $dc) {
                if($d->id_documento == $dc->id_documento){
                    $d->activo = 0;
                }
            }
        }

        $e = 0;
        foreach ($documentos as $doc) {
            if($doc->activo==1){
                $e=1;
            }
        }
        $cliente = Cliente::findOrFail($id_cliente);
        return view('clientes.documentos.index',compact('documentosclientes','cliente','documentos','e'));
    }

    
    public function subir(Request $request)
    {    
        $file = $request->file('archivo');    
        $nombre = $file->getClientOriginalName();       

        $detalle = new Detalle();
        $detalle->id_ficha_cliente = $request->input('id_cliente');
        $detalle->id_documento = $request->input('id_documento');

        $cliente = Cliente::findOrFail($detalle->id_ficha_cliente);
        $detalle->ruta =  $request->file('archivo')->store('public');  
        
        $detalle->save();
   
        return redirect()->route('cliente.documento',$detalle->id_ficha_cliente);
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

    public function eliminar($id){

        $d = Detalle::findOrFail($id);   
        //  $id_documento = $request->input('id_documento');
        $id_cliente = $d->id_ficha_cliente;

        // $d = Detalle::findOrFail($id_documento);        
        Storage::delete($d->ruta);
        $d = Detalle::findOrFail($id)->delete();
        return redirect()->route('cliente.documento',$id_cliente);
    }
  
}
