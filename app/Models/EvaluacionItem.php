<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion_item';
    protected $fillable = [
        'nombre',
        'puntaje',
        'estado',
        'evaluacion_titulo_id'
    ];

    public function evaluacion_titulo(): BelongsTo {
        return $this->belongsTo(EvaluacionTitulo::class, 'evaluacion_titulo_id');
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
