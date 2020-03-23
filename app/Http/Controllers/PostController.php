<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts.index', compact('posts'));

    }

    public function create() {
        return view ('posts.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $posts = auth()->user()->posts()->create($data);

        return redirect('/posts/'.$posts->id);
    }

    // public function store(Request $request) {
    //     $post = new Post();

    //     $post->title = request('title');
    //     $post->author_id = Auth::user()->id;
    //     $post->author = Auth::user()->name;
    //     $post->author = request('author');
    //     $post->content = request('content');

    //     $post->save();

    //     return redirect('/posts');
    // }

    public function show(\App\Post $post) {
        $post = Post::findOrFail($post->id);
        
        return view('posts.show', compact('post'));
    }
}
