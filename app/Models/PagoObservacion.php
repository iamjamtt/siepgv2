<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoObservacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pago_observacion';
    protected $fillable = [
        'descripcion',
        'estado',
        'pago_id'
    ];

    public function pago(): BelongsTo {
        return $this->belongsTo(Pago::class, 'pago_id');
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
