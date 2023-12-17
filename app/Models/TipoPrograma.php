<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPrograma extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_programa';
    protected $fillable = [
        'nombre',
        'estado'
    ];
}
