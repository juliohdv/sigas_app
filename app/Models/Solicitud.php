<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;

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

    public function estadoCivil()
    {
        return $this->hasOne(EstadoCivil::class);
    }
    public function estadoSolicitud()
    {
        return $this->belongsTo(EstadoSolicitud::class,'estado_solicitud_id','id');
    }
    public function conyuge()
    {
        return $this->hasOne(Conyuge::class);
    }
    public function subRegion()
    {
        return $this->hasOne(Subregion::class);
    }
    public function residencia()
    {
        return $this->belongsTo(Residencia::class);
    }
    public function documento()
    {
        return $this->belongsTo(Document::class,'solicitud_id','id');
    }
    public function referencias()
    {
        return $this->hasMany(Referencia::class);
    }
    public function beneficiarios()
    {
        return $this->hasMany(Beneficiario::class);
    }
    public function asociado()
    {
        return $this->belongsTo(Asociado::class);
    }
    public function actividadEconomica()
    {
        return $this->hasMany(ActividadEconomica::class);
    }
}
