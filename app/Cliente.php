<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['nombre', 'dni', 'ruc', 'direccion', 'telefono', 'email', 'web', 'folio', 'limite_credito', 'deuda_actual'];
    
    
    public function ActualizarSaldo(int $limiteAnt, int $limiteAct, int $saldoAnt){
    
    }
}
