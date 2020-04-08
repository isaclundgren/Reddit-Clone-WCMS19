<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserController extends Controller
{
        public function index (){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            return view('user.index')
                ->with('user', $user)
                ->with('posts', $user->posts);
        }

        public function destroy($id) {
            if(auth()->user()->is_admin == true) {
                $post = Post::findOrFail($id)->delete();
                return redirect('/users');
            } else {
                $post = Post::findOrFail($id)->delete();
                return redirect ('/user');
            }
        }

        public function show($slug) {
            //  if(auth()->user()->id === $post->user_id) {
                //$post = Post::findOrFail($post->id);
                $post = Post::where('slug', $slug)->first();
                return view('user.show', compact('post'));
            // } else {
            //     return redirect('/posts');
        }

        public function update() {
            //
        }
}


