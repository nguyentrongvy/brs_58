<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'publish_date',
        'author',
        'number_of_page',
        'image',
        'title',
        'total_rate',
        'total_like',
        'description',
    ];

    public function reads()
    {
        return $this->hasMany(Read::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function bookCategorys()
    {
        return $this->hasMany(BookCategory::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories', 'book_id', 'category_id');
    }
}
