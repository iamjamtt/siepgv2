<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionObservacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion_observacion';
    protected $fillable = [
        'observacion',
        'estado',
        'evaluacion_id',
        'tipo_evaluacion_id'
    ];

    public function evaluacion(): BelongsTo {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    public function tipo_evaluacion(): BelongsTo {
        return $this->belongsTo(TipoEvaluacion::class, 'tipo_evaluacion_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = auth()->id();
            $model->save();
        });
    }
}
