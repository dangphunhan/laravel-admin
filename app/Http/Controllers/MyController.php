<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function GetAllPost(){
        $allPost = Post::orderByDesc('created_at')->paginate(15);
        return view('home', ['allPost'=> $allPost]);
    }
    public function postDetail($slug){
        if (Post::where('slug', $slug)->exists()) {
            $postDetail = Post::where('slug', $slug)->first();
            return view('post-detail', compact('postDetail'));
        }
        else{
            return redirect('/')->with('success', 'No post');
        }
      
    }
}
