<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroCuenta',
        'saldo',
        'asociado_id',
        'tipo_cuenta_id',
    ];
    protected $table = 'cuenta';

    public function tipoCuenta()
    {
        return $this->belongsTo(TipoCuenta::class,'tipo_cuenta_id','id');
    }
}
