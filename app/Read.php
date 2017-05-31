<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    protected $table = 'reads';

    protected $fillable = [
    	'user_id',
    	'book_id',
    	'status'
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
