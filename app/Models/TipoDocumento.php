<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment\Doc;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoDocumento',
    ];
    protected $table = 'tipo_documento_tabl';

    public function documentos()
    {
        return $this->belongsTo(Documento::class);
    }
}
