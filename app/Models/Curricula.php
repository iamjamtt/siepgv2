<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curricula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'curricula';
    protected $fillable = [
        'codigo',
        'plan_id',
        'programa_id',
        'estado'
    ];

    public function plan(): BelongsTo {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function programa(): BelongsTo {
        return $this->belongsTo(Programa::class, 'programa_id');
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
