<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admision extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admision';
    protected $fillable = [
        'numero',
        'codigo',
        'nombre',
        'convocatoria',
        'resolucion',
        'resolucion_fecha',
        'resolucion_path',
        'fecha_inicio_inscripcion',
        'fecha_fin_inscripcion',
        'fecha_inicio_expediente',
        'fecha_fin_expediente',
        'fecha_inicio_entrevista',
        'fecha_fin_entrevista',
        'fecha_resultados',
        'fecha_inicio_matricula',
        'fecha_fin_matricula',
        'fecha_inicio_extemporanea',
        'fecha_fin_extemporanea',
        'estado',
    ];

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
