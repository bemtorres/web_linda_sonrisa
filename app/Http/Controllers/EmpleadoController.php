<?php

namespace App\Http\Controllers;
use DB;
use App\Modelo\Empleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarCreateEmpleado as CreateEmpleadoRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::all()->where('id_tipo_empleado',2);        
        return view('empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        //
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
        $e->id_tipo_empleado=2;
        $e->save(); 
        return redirect()->route('empleado.index');
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
        $u = Empleado::findOrFail($id);
        return view('empleados.show', compact('u'));
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
        $u = Empleado::findOrFail($id);

        return view('empleados.edit', compact('u'));
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
        $e = Empleado::findOrFail($id);
        $e->username= $request->input('username');;
        $e->password= bcrypt('12345');
        $e->run= $request->input('rut');;
        $e->nombres= $request->input('nombres');;
        $e->apellidos= $request->input('apellidos');;
        // $e->id_tipo_user='2';
        $e->correo= $request->input('correo');;
        $e->activo=1;
        $e->update();
        return redirect()->route('empleado.index');
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
        // $e = Empleado::findOrFail($id)->delete();
        DB::table('users')->where('id_user', $id)->delete();

        return redirect()->route('empleado.index');
    }
}
