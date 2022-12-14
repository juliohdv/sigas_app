<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conyuge extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];
    protected $table = 'conyuge';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class,'conyuge_id','id');
    }
}
