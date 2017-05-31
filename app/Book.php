<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
    	'name',
    	'slug',
    	'publish_date',
    	'author',
    	'number_of_page',
    	'image',
    	'title',
    	'total_rate',
        'total_like'
    ];

    public function read()
    {
        return $this->hasMany('\App\Read', 'book_id');
    }

    public function rate()
    {
        return $this->hasMany('\App\Rate', 'book_id');
    }

    public function bookCategory()
    {
        return $this->hasMany('\App\BookCategory', 'book_id');
    }

    public function favorite()
    {
        return $this->hasMany('\App\Favorite', 'book_id');
    }
}
