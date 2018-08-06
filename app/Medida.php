<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medida extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public $timestamps = false;
    
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
