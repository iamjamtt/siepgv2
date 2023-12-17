<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'plan';
    protected $fillable = [
        'codigo',
        'nombre',
        'resolucion',
        'resolucion_fecha',
        'resolucion_path',
        'estado'
    ];
}
