<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $fillable = [
    	'user_id',
    	'content',
    	'author',
    	'image',
    	'title',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
