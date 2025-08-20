<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model
{
    protected $fillable = [
        'name',
        'main_image',
        'description',
        'slug',
        'link',
        'icon_path',
        'type',
        'mostrar'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'products__products_categories', 'categorie_id', 'product_id');
    }

    public function analytics()
    {
        return $this->hasMany(Analytics::class, 'categorie_id', 'id');
    }

    public function comunicado()
    {
        return $this->hasOne(Comunicado::class, 'categorie_id');
    }
}
