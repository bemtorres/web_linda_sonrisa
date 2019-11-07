<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailer;

use App\Modelo\Empleado;
use App\Modelo\Ficha_cliente as Cliente;
use App\Modelo\Ficha_proveedor as Proveedor;

class MailController extends Controller
{
    public function mail()
    {
       $nombre = 'Benjamin';
       $username = "Esteban";
       $password =  "12345";

       try {
     
            Mail::to('benja.mora.torres@gmail.com')->queue(new SendMailer($nombre,$username,$password));
    
            return 'Enviado';
        } catch (\Throwable $th) {
            return $th;
        }
   
       
       
    }


    public function recuperarEmpleado(Request $request)
    {
       

       try {

            $em = Empleado::where('correo', $request->input('correo'))->firstOrFail();
       
            $nombre = $em->nombres . " " . $em->apellidos;
            $username = $em->username;
            $password = $this->generarCodigo(5);
            $em->password = bcrypt($password);
            $em->update();
            Mail::to($em->correo)->queue(new SendMailer($nombre,$username,$password));
    
            return back()->with('success',"Se ha enviado un correo."); 
        } catch (\Throwable $th) {
            // return $th;
            return back()->with('info',"Error intente nuevamente."); 
        }
   
       
       
    }


    public function recuperarCliente(Request $request)
    {
       

       try {

            $c = Cliente::where('run', $request->input('run'))->firstOrFail();
       
            $nombre = $c->nombres . " " . $c->apellidos;
            $username = $c->username;
            $password = $this->generarCodigo(5);
            $c->password =  hash('sha256',$password);;
            $c->update();
            Mail::to($c->correo)->queue(new SendMailer($nombre,$username,$password));
    
            return back()->with('success',"Se ha enviado un correo."); 
        } catch (\Throwable $th) {
            // return $th;
            return back()->with('info',"Error intente nuevamente."); 
        }
   
       
       
    }


    public function recuperarProveedor($correo)
    {
       

       try {

            $p = Proveedor::where('correo', $correo)->firstOrFail();
       
            $nombre = $p->nombre_empresa;
            $username = $p->username;
            $password = $this->generarCodigo(5);
            $p->password =  hash('sha256',$password);;
            $p->update();
            Mail::to($correo)->queue(new SendMailer($nombre,$username,$password));
    
            return response()->json('ok',201);
        } catch (\Throwable $th) {
            // return $th;
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404); 
        }
   
       
       
    }

    private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }
}
