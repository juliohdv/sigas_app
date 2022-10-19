<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'primerApellido',
        'segundoApellido',
        'apellidoCasada',
        'genero',
        'fechaNacimiento',
        'nacionalidad',
        'email1',
        'email2',
        'telefonoCasa',
        'telefonoTrabajo',
        'celular1',
        'celular2',
        'subregiones_id',
        'conyuge_id',
        'estado_civil_id',
        'estado_solicitud_id',
        'conyuge_nombre',
        'conyuge_direccion',
        'conyuge_telefono',
    ];
    protected $table = 'solicitud';

    public function estado()
    {
        return $this->belongsTo(EstadoSolicitud::class, 'estado_solicitud_id');
    }
}
