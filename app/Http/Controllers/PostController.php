<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
Use App\User;
use App\Subreddit;



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

    public function create(Subreddit $subreddit) {
        return view('posts.create', [
            'subreddit' => $subreddit
        ]);
    }

    public function store(Request $request, Subreddit $subreddit) {   
        $data = request()->validate([
            'title' => 'required',
            'link' => 'required',
            'content' => 'required',
        ]);


        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->subreddit_id = $subreddit->id;
        $post->title = $request->input('title');
        $post->link = $request->input('link');
        $post->content = $request->input('content');
       
        $post->save();
    
        return redirect('/posts/'.$post->id);
    }


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


                // public function store(\App\Post $post) {
    //     $data = request()->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'subreddit' => 'exists:subreddits,name'
    //         // 'categories' => 'required|array'
    //     ]);
        
    //     $subredditName = $request->get('subreddit');

    //     $subreddit = Subreddit::where('name', $subredditName)->first();

    //     $posts = auth()->user()->posts()->create($data);

    //     return redirect('/posts/'.$posts->id);
    // }
    }
}
