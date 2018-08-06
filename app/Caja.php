<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caja extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at', 'ultimo_ingreso'];
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
