<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alumno';
    protected $fillable = [
        'codigo',
        'estado',
        'persona_id',
        'evaluacion_id',
        'curricula_id',
        'curricula_antigua_id',
        'admision_id',
    ];

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function evaluacion(): BelongsTo {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }

    public function curricula(): BelongsTo {
        return $this->belongsTo(Curricula::class, 'curricula_id');
    }

    public function curricula_antigua(): BelongsTo {
        return $this->belongsTo(Curricula::class, 'curricula_antigua_id');
    }

    public function admision(): BelongsTo {
        return $this->belongsTo(Admision::class, 'admision_id');
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
