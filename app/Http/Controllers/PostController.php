<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
Use App\User;
use App\Subreddit;
use Illuminate\Support\Str;



class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    

    // public function index() {
    //     if(auth()->user()->is_admin == true){
    //         $posts = Post::all();
    //         return view('posts.index')
    //             ->with('posts', $posts);
                
    //     } else {
    //         $user_id = auth()->user()->id;
    //         $user = User::find($user_id);
    //         return view('posts.index')
    //             ->with('posts', $user->posts);
    //     }
    // }

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
        $post->slug = Str::slug(request('title'));
        $post->link = $request->input('link');
        $post->content = $request->input('content');
       
        $post->save();
    
        return redirect('/subreddits/'.$subreddit->id);
    }


    public function show(Subreddit $subreddit, User $user, $slug) {

        $post = Post::where('slug', $slug)->first();
            if(is_null($post)) {
                return redirect('/subreddits');
            } else {
                return view('posts.show')
                    ->with('post', $post)
                    ->with('subreddit', $subreddit)
                    ->with('user', $user);
            }

        //  if(auth()->user()->id === $post->user_id) {
            //working version
            // $post = Post::findOrFail($post->id);
            // return view('posts.show', compact('post'));
        // } else {
        //     return redirect('/posts');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id)->delete();
        return redirect('/user');
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
        
        return redirect('/user')
            ->with('success', 'Post updated successfully');

    }
}
