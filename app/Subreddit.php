<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    protected $guarded = [];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function posts () {
        return $this->hasMany(Post::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
