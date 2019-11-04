<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
