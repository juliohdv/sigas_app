<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $table = 'subregiones';

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'subregiones_id','id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'regiones_id','id');
    }
    public function residencia()
    {
        return $this->belongsTo(Residencia::class,'subregiones_id','id');
    }
}
