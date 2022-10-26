<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'sector',
    ];
    protected $table = 'sector';

    public function actividadEconomica()
    {
        return $this->belongsTo(ActividadEconomica::class);
    }
}
