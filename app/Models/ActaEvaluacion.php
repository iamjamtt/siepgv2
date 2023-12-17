<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActaEvaluacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'acta_evaluacion';
    protected $fillable = [
        'acta_path',
        'estado',
        'curricula_id',
    ];

    public function curricula(): BelongsTo {
        return $this->belongsTo(Curricula::class, 'curricula_id');
    }
}
