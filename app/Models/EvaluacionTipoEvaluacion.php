<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionTipoEvaluacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion_tipo_evaluacion';
    protected $fillable = [
        'puntaje',
        'estado',
        'evaluacion_id',
        'tipo_evaluacion_id',
        'evaluacion_titulo_id'
    ];

    public function evaluacion(): BelongsTo {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    public function tipo_evaluacion(): BelongsTo {
        return $this->belongsTo(TipoEvaluacion::class, 'tipo_evaluacion_id');
    }

    public function evaluacion_titulo(): BelongsTo {
        return $this->belongsTo(EvaluacionTitulo::class, 'evaluacion_titulo_id');
    }
}
