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
        'ingresos',
        'egresos',
        'sector_id',
        'profesion_id',
        'solicitud_id',
    ];
    protected $table = 'actividad_economica';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class,'solicitud_id','id');
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class,'sector_id','id');
    }
    public function profesion()
    {
        return $this->hasOne(Profesion::class);
    }
}
