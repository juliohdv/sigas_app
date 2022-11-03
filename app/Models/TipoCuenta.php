<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoCuenta',
    ];
    protected $table = 'tipo_cuenta';

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class,'tipo_cuenta_id','id');
    }
}
