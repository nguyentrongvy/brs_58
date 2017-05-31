<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
    	'user_id',
    	'book_id'
    ];

    public function book()
    {
    	return $this->belongsTo('\App\Book', 'book_id');
    }

    public function user()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }
}
