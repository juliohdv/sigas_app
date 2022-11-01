<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Residencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'barrioColoniaResidencial',
        'callePasaje',
        'casaDepartamento',
        'ubicacionmapa',
        'subregion_id',
        'solicitud_id',
    ];
    protected $table = 'residencia';

    public function subregion()
    {
        return $this->belongsTo(Subregion::class,'subregion_id','id');
    }
    public function solicitudes()
    {
        return $this->belongsTo(Solicitud::class);
    }

}
