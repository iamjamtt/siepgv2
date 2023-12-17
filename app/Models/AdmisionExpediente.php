<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdmisionExpediente extends Model
{
    use HasFactory;

    protected $table = 'admision_expediente';
    protected $fillable = [
        'seguimiento',
        'estado',
        'admision_id',
        'expediente_id',
    ];

    public function admision(): BelongsTo {
        return $this->belongsTo(Admision::class, 'admision_id');
    }

    public function expediente(): BelongsTo {
        return $this->belongsTo(Expediente::class, 'expediente_id');
    }
}
