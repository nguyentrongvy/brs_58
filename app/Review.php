<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
    	'user_id',
    	'content'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }

    public function comment()
    {
    	return $this->hasMany('\App\Comment', 'review_id');
    }
}
