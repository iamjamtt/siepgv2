<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdmisionCurricula extends Model
{
    use HasFactory;

    protected $table = 'admision_curricula';
    protected $fillable = [
        'admision_id',
        'curricula_id',
    ];

    public function admision(): BelongsTo {
        return $this->belongsTo(Admision::class, 'admision_id');
    }

    public function curricula(): BelongsTo {
        return $this->belongsTo(Curricula::class, 'curricula_id');
    }
}
