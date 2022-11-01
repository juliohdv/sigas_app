<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoReferencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoReferencia',
    ];
    protected $table = 'tipo_referencia';

    public function solicitud()
    {
        return $this->belongsTo(Referencia::class,'tipo_referencia_id','id');
    }
}
