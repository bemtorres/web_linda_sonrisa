<?php

namespace App\Http\Controllers;

use App\Modelo\Odontologo;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarCreateOdontologo as CreateOdontologoRequest;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odontologos = Odontologo::all();        
        return view('odontologos.index',compact('odontologos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('odontologos.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOdontologoRequest $request)
    {
  
            try {
                $odo = Odontologo::where('run', $request->input('run'))->firstOrFail();
                return back()->with('info','Error Odontólogo ya existe.'); 
            } catch (\Throwable $th) {              
                $o = new Odontologo;        
                $o->run = $request->input('run');
                $o->username = $o->run; 
                // $o->password = bcrypt('12345');                
                $o->password = hash('sha256',12345);
                $o->nombres = $request->input('nombres');
                $o->apellidos = $request->input('apellidos');
                $o->telefono = $request->input('telefono');
                $o->correo = $request->input('correo');
                $o->activo = 1;
                $o->save(); 
                return redirect()->route('odontologo.index')->with('success','Se ha agregdo correctamente.');
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
        $o = Odontologo::findOrFail($id);

        return view('odontologos.edit', compact('o'));
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
            $o = Odontologo::findOrFail($id);
            $o->run = $request->input('run');
            $o->username = $o->run; 
            // $o->password = bcrypt('12345');          
            $o->nombres = $request->input('nombres');
            $o->apellidos = $request->input('apellidos');
            $o->telefono = $request->input('telefono');
            $o->correo = $request->input('correo');
            $o->activo = 1;
            $o->update(); 
            return back()->with('success','Se ha actualizado correctamente.');
        } catch (\Throwable $th) {              
         
            return back()->with('info','Error no se puede editar.'); 
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
        return $id;
    }
}
