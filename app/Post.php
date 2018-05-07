<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Comment;

class Post extends Model
{
    //

	protected $fillable	=	[
			"title",
			"category",
			"content",
			"user_id",
			"image"
	];

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
