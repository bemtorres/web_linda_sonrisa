<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Empleado;
use App\Http\Requests\ValidarCreateEmpleado as CreateEmpleadoRequest;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Empleado::where('id_tipo_empleado',1)->get();        
        return view('administradores.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('administradores.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        try {
            $em = Empleado::where('run', $request->input('run'))->firstOrFail();
            return back()->with('info','Error. Empleado ya existe.'); 
        } catch (\Throwable $th) {

            $e = new Empleado;        
            $e->run = $request->input('run');
            $e->username = $e->run; 
            $e->password = bcrypt('12345');
            $e->nombres = $request->input('nombres');
            $e->apellidos = $request->input('apellidos');
            $e->telefono = $request->input('telefono');
            $e->correo = $request->input('correo');
            $e->bloqueado = 0;
            $e->activo = 1;
            $e->id_tipo_empleado=1;
            $e->save(); 
            return redirect()->route('administrador.index')->with('success','Se ha agregado correctamente');
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
