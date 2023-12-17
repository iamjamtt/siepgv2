<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PuntajeEvaluacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'puntaje_evaluacion';
    protected $fillable = [
        'puntaje',
        'estado',
        'tipo_programa_id'
    ];

    public function tipo_programa(): BelongsTo {
        return $this->belongsTo(TipoPrograma::class, 'tipo_programa_id');
    }
}
