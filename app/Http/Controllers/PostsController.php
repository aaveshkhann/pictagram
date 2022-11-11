<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
class PostsController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

        public function store(Request $request)
        {
            $imagepath=(request('image')->store('upload','public'));

            auth()->user()->posts()->create([
                'caption'=>$request->caption,
                'image'=>$imagepath
            ]);
        return redirect('/profile');
    }

        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
        }



}

