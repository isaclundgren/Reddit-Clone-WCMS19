<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use App\User;
Use Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    

    public function index() {
        if(auth()->user()->is_admin == true){
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        } else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            return view('posts.index')->with('posts', $user->posts);
        }
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
        if(auth()->user()->id === $post->user_id) {
            $post = Post::findOrFail($post->id);
            return view('posts.show', compact('post'));
        } else {
            return redirect('/posts');
        }
    }

    public function destroy($id) {
        $post = Post::findOrFail($id)->delete();
        return redirect('/posts');
    }

    public function edit($id) {
        $post = Post::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();

        return view('posts.edit', compact('post', 'id'));
    }

    public function update(Request $request, $id) {
        
        $post = new Post();
        
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $data['id'] = $id;
        $post->updateTicket($data);
        // $post->update($request->all());
        
        return redirect('/posts')
            ->with('success', 'Post updated successfully');
    }
}
