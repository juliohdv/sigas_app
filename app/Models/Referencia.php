<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'meses',
        'tipo_referencia_id',
        'solicitud_id',
    ];
    protected $table = 'referencia';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function tipoReferencia()
    {
        return $this->belongsTo(TipoReferencia::class,'tipo_referencia_id','id');
    }
}
