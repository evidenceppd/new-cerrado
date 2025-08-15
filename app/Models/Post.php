<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'published',
        'main_image',
        'url',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'author',
    ];


    public function analytics()
    {
        return $this->hasMany(Analytics::class, 'post_id', 'id');
    }
}
