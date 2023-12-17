<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConceptoPago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'concepto_pago';
    protected $fillable = [
        'nombre',
        'monto',
        'estado'
    ];
}
