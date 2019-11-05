<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\Reservar_hora as Reservar;

use App\Modelo\Ficha_cliente as Cliente;
use App\Modelo\Servicio;
use App\Modelo\Horario;
use App\Http\Requests\ValidarSolicitudHora as SolicitudRequest;


class ReservarHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::get();
        return view('perfil_cliente.solicitud',compact('servicios'));
    }

    // Fecth consulta para saber los horarios disponibles
    public function horasDisponibles($fecha){
        
        $reservas = Reservar::where('fecha_reserva',$fecha)->get();
        $horarios = Horario::get();

        foreach ($reservas as $r) {
            foreach ($horarios as $h) {
                if($r->id_horario==$h->id_horario){
                    if($r->id_estado_reserva!=0){
                        $h->activo = 0;
                    }
                    
                }
            }
        }

        return $horarios;
    }



    public function historial()
    {
        return view('perfil_cliente.historial');
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
    public function store(SolicitudRequest $request)
    {
        try {
            $r = new Reservar();
            $r->id_centro = 1;
            $r->fecha_reserva = $request->input('fecha_agenda');
            $r->id_horario = $request->input('id_horario');
            $r->id_servicio = $request->input('id_servicio');
            $r->id_ficha_cliente = $request->input('id_cliente');
            $r->id_estado_reserva =1;
            $r->activo =1;
            $r->save();
            $estado = 1;

            // $servicios = Servicio::get();
            return back()->with('success','Se ha agendado una hora correctamente');
          
            // return view('perfil_cliente.solicitud',compact('estado','servicios'));
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente ' . $th);
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
        try {

            $r = Reservar::findOrFail($id);
            $r->id_estado_reserva = 0;          
            $r->update();   
        } catch (\Throwable $th) {
            // return $th;
            return back()->with('info','Error intente nuevamente.'); 
        }
            
        return redirect()->route('cliente.historial');
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
