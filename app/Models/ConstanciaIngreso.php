<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConstanciaIngreso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'constancia_ingreso';
    protected $fillable = [
        'codigo',
        'constancia_path',
        'estado',
        'pago_id',
        'alumno_id'
    ];

    public function pago(): BelongsTo {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function alumno(): BelongsTo {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
