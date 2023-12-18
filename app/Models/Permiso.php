<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'permiso';
    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Rol::class, 'rol_permiso', 'permiso_id', 'rol_id');
    }

    public function scopeSearch($query, $search) {
        if ($search) {
            return $query->where('nombre', 'LIKE', "%{$search}%");
        }
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
