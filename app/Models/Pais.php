<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'iso3',
        'iso2',
        'numeric_code',
        'phone_code',
        'emoji',
    ];
    
    protected $table = 'paises';

    public function regiones()
    {
        return $this->hasMany(Region::class,'paises_id','id');
    }
}
