<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $fillable = [
        'name',
        'categorie_id',
        'description',
        'created_at',
        'updated_at',
        'icon_path',
        'link',
        'mostrar'
    ];

    public function category()
    {
        return $this->belongsTo(ProductsCategories::class, 'caterogorie_id');
    }
}
