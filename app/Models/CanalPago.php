<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CanalPago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'canal_pago';
    protected $fillable = [
        'nombre',
        'estado'
    ];
}
