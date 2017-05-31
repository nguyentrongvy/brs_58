<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name',
    	'slug',
    	'parent_id',
    ];

    public function bookCategorys()
    {
    	return $this->hasMany(BookCategory::class);
    }

    public function books()
    {
    	return $this->belongsToMany(Book::class, 'book_categories', 'category_id', 'book_id');
    }
}
