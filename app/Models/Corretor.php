<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'especialidade',
        'mostrar',
        'created_at',
        'updated_at',
    ];
}
