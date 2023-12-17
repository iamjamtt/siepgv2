<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionTitulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion_titulo';
    protected $fillable = [
        'nombre',
        'puntaje',
        'estado',
        'tipo_evaluacion_id'
    ];

    public function tipo_evaluacion(): BelongsTo {
        return $this->belongsTo(TipoEvaluacion::class, 'tipo_evaluacion_id');
    }
}
