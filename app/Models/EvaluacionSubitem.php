<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionSubitem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evaluacion_subitem';
    protected $fillable = [
        'nombre',
        'puntaje',
        'estado',
        'evaluacion_item_id'
    ];

    public function evaluacion_item(): BelongsTo {
        return $this->belongsTo(EvaluacionItem::class, 'evaluacion_item_id');
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
