<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'usuario';
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'avatar_path',
        'rol_id',
        'perfil_id',
        'estado'
    ];

    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
