<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
        'categories' => 'array'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subreddit() {
        return $this->belongsTo(Subreddit::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


    public function updateTicket($data) {
        $post = $this->find($data['id']);
        $post->user_id = auth()->user()->id;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();
        return 1;
    }
}
