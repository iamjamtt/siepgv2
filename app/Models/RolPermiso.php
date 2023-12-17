<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasFactory;

    protected $table = 'rol_permiso';
    protected $fillable = [
        'rol_id',
        'permiso_id',
    ];
}
