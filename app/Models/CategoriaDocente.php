<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaDocente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categoria_docente';
    protected $fillable = [
        'nombre',
        'estado'
    ];
}
