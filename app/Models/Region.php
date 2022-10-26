<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_code'
    ];
    protected $table = 'regiones';

    public function subregiones()
    {
        return $this->belongsTo(Subregion::class,'regiones_id','id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class,'paises_id','id');
    }
}
