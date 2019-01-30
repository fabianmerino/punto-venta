<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    protected $fillable = ['nombre'];
    
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
