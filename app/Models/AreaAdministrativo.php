<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaAdministrativo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'area_administrativo';
    protected $fillable = [
        'nombre',
        'estado'
    ];
}
