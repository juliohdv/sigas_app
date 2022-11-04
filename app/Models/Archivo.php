<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreArchivo',
        'path',
        'solicitud_id',
    ];
    protected $table = 'archivos';

    public function solicitud(){
        return $this->belongsTo(Solicitud::class,'solicitud_id','id');
    }
}
