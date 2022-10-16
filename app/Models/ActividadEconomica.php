<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadEconomica extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreEmpresa',
        'cargoPuesto',
        'años',
        'meses',
        'empleadoEmpresario',
        'sector_id',
        'profesion_id',
        'solicitud_id',
    ];
    protected $table = 'actividad_economica';
}
