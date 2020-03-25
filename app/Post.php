<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
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
