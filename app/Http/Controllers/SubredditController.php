<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Subreddit;
Use App\User;


class SubredditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    

    public function index() {
        if(auth()->user()->is_admin == true){
            $subreddits = Subreddit::all();
            return view('subreddits.index', compact('subreddits'));
        } else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            return view('subreddits.index')->with('subreddits', $user->subreddits);
        }
    }

    public function create() {
        return view ('subreddits.create');
    }

    public function store(\App\Subreddit $subreddit) {
        $data = request()->validate([
            'name' => 'required',
            'title' => 'required',
        ]);

        $subreddits = auth()->user()->subreddits()->create($data);

        return redirect('/subreddits/'.$subreddits->id);
    }


    public function show(\App\Subreddit $subreddit) {


        $posts = Subreddit::findOrFail($subreddit->id)->posts()->get();
        
        return view('subreddits.show')
            ->with('subreddit', $subreddit)
            ->with('posts', $posts);

        // return view('subreddits.show', [
        //     'subreddit' => $subreddit,
        //     'posts' => $subreddit->posts
        // ]);

        // if(auth()->user()->id === $subreddit->user_id) {
        //     $subreddit = Subreddit::findOrFail($subreddit->id);
        //     return view('subreddits.show', compact('subreddit'));
        // } else {
        //     return redirect('/subreddits');
        // }
    }

    // public function destroy($id) {
    //     $post = Post::findOrFail($id)->delete();
    //     return redirect('/posts');
    // }

    // public function edit($id) {
    //     $post = Post::where('user_id', auth()->user()->id)
    //         ->where('id', $id)
    //         ->first();

    //     return view('posts.edit', compact('post', 'id'));
    // }

    // public function update(Request $request, $id) {
        
    //     $post = new Post();
        
    //     $data = $this->validate($request, [
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);
        
    //     $data['id'] = $id;
    //     $post->updateTicket($data);
    //     // $post->update($request->all());
        
    //     return redirect('/posts')
    //         ->with('success', 'Post updated successfully');
    // }
}
