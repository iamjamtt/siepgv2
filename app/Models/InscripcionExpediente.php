<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscripcionExpediente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inscripcion_expediente';
    protected $fillable = [
        'expediente_path',
        'seguimiento',
        'estado',
        'admision_expediente_id',
        'inscripcion_id'
    ];

    public function admisionExpediente(): BelongsTo {
        return $this->belongsTo(AdmisionExpediente::class, 'admision_expediente_id');
    }

    public function inscripcion(): BelongsTo {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }
}
