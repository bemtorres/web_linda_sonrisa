<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'COMUNA';
    protected $primaryKey = 'ID_COMUNA';
    public $incrementing = false;
    public $timestamps = false;
}
