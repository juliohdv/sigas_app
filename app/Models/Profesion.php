<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;
    protected $fillable = [
        'profesion',
    ];
    protected $table = 'profesion';

    public function actividadEconomica()
    {
        return $this->belongsTo(ActividadEconomica::class);
    }
}
