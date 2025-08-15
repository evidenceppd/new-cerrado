<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'layout_design',
        'published',
        'description',
        'content',
        'main_image',
        'sku',
        'slug',
        'published'
    ];

    public function images()
    {
        return $this->hasMany(ImagesProduct::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductsCategories::class, 'products__products_categories', 'product_id', 'categorie_id');
    }

    public function analytics()
    {
        return $this->hasMany(Analytics::class, 'product_id', 'id');
    }
}
