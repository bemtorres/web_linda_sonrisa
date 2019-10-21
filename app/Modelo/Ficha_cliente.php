<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Ficha_cliente extends Model
{
    protected $table = 'ficha_cliente';
    protected $primaryKey = 'id_ficha_cliente';


    public function comuna(){
        return $this->belongsTo(Comuna::class,'id_comuna');
    }
}
