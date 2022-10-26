<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroDocumento',
        'tipo_documento_id',
        'solicitud_id',
    ];
    protected $table = 'documento';

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class,'solicitud_id','id');
    }
}
