<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
    use HasFactory;
    protected $fillable = [
        'estadoSolicitud',
    ];
    protected $table = 'estado_solicitud';

}
