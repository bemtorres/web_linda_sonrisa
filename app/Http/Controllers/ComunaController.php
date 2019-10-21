<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\Comuna;

class ComunaController extends Controller
{
    public function buscar($id)
    {
        $comunas = Comuna::where('id_region',$id)->orderBy('nombre_comuna')->get();       
        
        if(sizeof($comunas)>0){
            return $comunas;
            // return response()->json(['comuna'=>array($comunas)],200);
        }else{
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
        }
    }
}
