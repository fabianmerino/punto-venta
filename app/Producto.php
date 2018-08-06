<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    
    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }
}
