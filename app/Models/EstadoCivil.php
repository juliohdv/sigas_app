<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;
    protected $fillable = [
        'estadoCivil',
    ];
    protected $table = 'estado_civil';

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class, 'estado_solicitud_id');
    }
}
