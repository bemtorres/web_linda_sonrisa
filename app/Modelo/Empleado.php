<?php

namespace App\Modelo;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $table = 'EMPLEADO';
    protected $primaryKey = 'ID_EMPLEADO';

    protected $guard = 'empleado';
    // protected $fillable = ['rut_empleado','nombre_empleado','categoria','password'];
    
    protected $hidden = ['password'];
}
