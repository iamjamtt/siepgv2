<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubigeo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ubigeo';
    protected $fillable = [
        'codigo',
        'codigo_departamento',
        'codigo_provincia',
        'codigo_distrito',
        'departamento',
        'provincia',
        'distrito',
        'estado'
    ];
}
