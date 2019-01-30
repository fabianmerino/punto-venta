<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Componentes extends Model
{
    public $timestamps = false;
    
    public function producto_padre()
    {
        return $this->belongsTo(Producto::class);
    }
    
    public function producto_hijo()
    {
        return $this->belongsTo(Producto::class);
    }
}
