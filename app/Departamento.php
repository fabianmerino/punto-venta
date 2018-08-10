<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    //
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public $timestamps = false;
    
    protected $fillable = ['nombre'];
    
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
