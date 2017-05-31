<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = [
    	'follower_id',
    	'followed_id'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\User', 'follower_id');
    }
}
