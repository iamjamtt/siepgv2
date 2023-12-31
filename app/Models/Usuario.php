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
        'persona_id',
        'estado'
    ];

    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function persona(): BelongsTo {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function getAvatarAttribute(): string {
        if ($this->avatar_path) {
            return $this->avatar_path;
        }
        return $this->avatar_path ?? 'https://ui-avatars.com/api/?name=' . $this->nombre . '&size=64&&color=FFFFFF&background=3F83F8&bold=true';
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
