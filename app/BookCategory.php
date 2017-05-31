<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_categories';

    protected $fillable = [
    	'category_id',
    	'book_id'
    ];

    public function book()
    {
    	return $this->belongsTo('\App\Book', 'book_id');
    }

    public function category()
    {
    	return $this->belongsTo('\App\Category', 'category_id');
    }
}
