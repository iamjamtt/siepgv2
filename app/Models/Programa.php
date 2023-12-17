<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'programa';
    protected $fillable = [
        'abreviatura',
        'nombre_programa',
        'nombre_mencion',
        'sunedu_id',
        'codigo_sunedu',
        'estado',
        'tipo_programa_id',
        'modalidad_id',
        'facultad_id',
        'sede_id',
    ];

    public function tipo_programa(): BelongsTo {
        return $this->belongsTo(TipoPrograma::class, 'tipo_programa_id');
    }

    public function modalidad(): BelongsTo {
        return $this->belongsTo(Modalidad::class, 'modalidad_id');
    }

    public function facultad(): BelongsTo {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function sede(): BelongsTo {
        return $this->belongsTo(Sede::class, 'sede_id');
    }
}
