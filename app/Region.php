<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'REGION';
    protected $primaryKey = 'ID_REGION';
    public $incrementing = false;
    public $timestamps = false;
}
