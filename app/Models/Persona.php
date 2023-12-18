<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'persona';
    protected $fillable = [
        'numero_documento',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'fecha_nacimiento',
        'direccion',
        'celular',
        'celular_opcional',
        'email',
        'email_opcional',
        'egreso',
        'especialidad_carrera',
        'centro_trabajo',
        'estado',
        'postulante',
        'tipo_documento_id',
        'discapacidad_id',
        'genero_id',
        'estado_civil_id',
        'grado_academico_id',
        'universidad_id',
        'ubigeo_direccion',
        'pais_direccion',
        'ubigeo_nacimiento',
        'pais_nacimiento',
    ];

    public function tipo_documento(): BelongsTo {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function discapacidad(): BelongsTo {
        return $this->belongsTo(Discapacidad::class, 'discapacidad_id');
    }

    public function genero(): BelongsTo {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function estado_civil(): BelongsTo {
        return $this->belongsTo(EstadoCivil::class, 'estado_civil_id');
    }

    public function grado_academico(): BelongsTo {
        return $this->belongsTo(GradoAcademico::class, 'grado_academico_id');
    }

    public function universidad(): BelongsTo {
        return $this->belongsTo(Universidad::class, 'universidad_id');
    }

    public function ubigeo_direccion(): BelongsTo {
        return $this->belongsTo(Ubigeo::class, 'ubigeo_direccion');
    }

    public function ubigeo_nacimiento(): BelongsTo {
        return $this->belongsTo(Ubigeo::class, 'ubigeo_nacimiento');
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
