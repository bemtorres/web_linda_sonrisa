<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_empleado extends Model
{
    protected $table = 'TIPO_EMPLEADO';
    protected $primaryKey = 'ID_TIPO_EMPLEADO';
    public $incrementing = false;
    // public $timestamps = false;
}
