<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
    	'review_id',
    	'user_id'
    	'content'
    ];

    public function review()
    {
    	return $this->belongsTo('\App\Review', 'review_id');
    }

    public function user()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }
}
