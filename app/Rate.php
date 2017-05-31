<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = [
    	'book_id',
    	'user_id',
    	'point'
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
