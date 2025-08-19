<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{

    protected $fillable = [
        'product_id',
        'deviceType',
        'date_analytics_view',
        'date_analytics_view',
        'views'
    ];

    public function analytics()
    {
        return $this->belongsTo(Analytics::class);
    }
}
