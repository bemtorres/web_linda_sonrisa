<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Familia;
use App\Http\Requests\ValidarCreateFamilia as FamiliaRequest;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::get();
        return view('familias_productos.index',compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familias_productos.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamiliaRequest $request)
    {
        try {
            $f = new Familia();
            $f->nombre_familia = $request->input('nombre_familia');
            $f->save();
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
    
        return redirect()->route('familia.index');
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
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliaRequest $request, $id)
    {
        try {
            $f = Familia::findOrFail($id);
            $f->nombre_familia = $request->input('nombre_familia');
            $f->update();
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
    
        return redirect()->route('familia.index');
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
