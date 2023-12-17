<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expediente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'expediente';
    protected $fillable = [
        'nombre',
        'complemento',
        'slug',
        'tipo',
        'estado'
    ];
}
