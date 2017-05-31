<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
    	'name',
    	'slug',
    	'parent_id'
    ];

    public function bookCategory()
    {
    	return $this->hasMany('\App\BookCategory', 'category_id');
    }

    public function book()
    {
    	return $this->belongsToMany('\App\Book', 'book_categories', 'category_id', 'book_id');
    }
}
