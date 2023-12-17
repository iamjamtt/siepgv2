<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pago';
    protected $fillable = [
        'operacion',
        'monto',
        'fecha',
        'estado',
        'verificacion',
        'voucher_path',
        'persona_id',
        'canal_pago_id',
        'concepto_pago_id'
    ];

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
