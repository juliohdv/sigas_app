<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'edad',
        'parentesco',
        'porcentaje',
        'solicitud_id',
    ];
    protected $table = 'beneficiario';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class,'solicitud_id','id');
    }
}
