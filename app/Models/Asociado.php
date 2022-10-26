<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'estado',
        'solicitud_id',
        
    ];
    protected $table = 'asociado';

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }
}
