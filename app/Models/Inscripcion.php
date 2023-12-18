<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inscripcion';
    protected $fillable = [
        'codigo',
        'ficha_path',
        'estado',
        'pago_id',
        'persona_id',
        'curricula_id',
        'admision_id'
    ];

    public function pago(): BelongsTo {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function curricula(): BelongsTo {
        return $this->belongsTo(Curricula::class, 'curricula_id');
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
