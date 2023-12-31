<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectorUnidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'director_unidad';
    protected $fillable = [
        'estado',
        'persona_id',
        'categoria_docente_id',
    ];

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function categoria_docente(): BelongsTo {
        return $this->belongsTo(CategoriaDocente::class, 'categoria_docente_id');
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
