<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'barrioColoniaResidencial',
        'callePasaje',
        'casaDepartamento',
        'latitudMapa',
        'longitudMapa',
        'subregion_id',
        'solicitud_id',
    ];
    protected $table = 'residencia';
}
