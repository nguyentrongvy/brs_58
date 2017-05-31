<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'suggests';

    protected $fillable = [
    	'user_id',
    	'content',
    	'author',
    	'image',
    	'title'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }
}
