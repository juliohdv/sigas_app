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
        return $this->belongsTo(EstadoCivil::class,'estado_civil_id','id');
    }
    public function estadoSolicitud()
    {
        return $this->belongsTo(EstadoSolicitud::class,'estado_solicitud_id','id');
    }
    public function conyuge()
    {
        return $this->belongsTo(Conyuge::class , 'conyuge_id','id');
    }
    public function subRegion()
    {
        return $this->belongsTo(Subregion::class, 'subregiones_id','id');
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
        return $this->belongsTo(Beneficiario::class,'solicitud_id','id');
    }
    public function asociado()
    {
        return $this->belongsTo(Asociado::class,'solicitud_id','id');
    }
    public function actividadEconomica()
    {
        return $this->belongsTo(ActividadEconomica::class,'solicitud_id','id');
    }
    public function archivos(){
        return $this->belongsTo(Archivo::class,'solicitud_id','id');
    }
}
