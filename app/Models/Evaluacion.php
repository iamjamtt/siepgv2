<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion';
    protected $fillable = [
        'puntaje_expediente',
        'fecha_expediente',
        'puntaje_investigacion',
        'fecha_investigacion',
        'puntaje_entrevista',
        'fecha_entrevista',
        'puntaje_final',
        'observacion',
        'estado',
        'inscripcion_id',
    ];

    public function inscripcion(): BelongsTo {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }
}
