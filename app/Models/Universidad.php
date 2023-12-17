<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Universidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'universidad';
    protected $fillable = [
        'nombre',
        'estado'
    ];
}
