<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActaEvaluacionResolucion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'acta_evaluacion_resolucion';
    protected $fillable = [
        'nombre',
        'adicional',
        'estado',
        'admision_id',
    ];

    public function admision(): BelongsTo {
        return $this->belongsTo(Admision::class, 'admision_id');
    }
}
