<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'ip',
        'resource_type',
        'resource_id',
        'url',
        'country',
        'region',
        'city',
        'zip',
        'lat',
        'lon',
        'date'
    ];
}
