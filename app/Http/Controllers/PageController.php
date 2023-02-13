<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function archive(Post $post)
    {
        $post = $post->get();
        return view('page/archive')->with(['posts' => $post]);
    }
    
    public function each_zoo($id)
    {
        $post = Post::where('zoo_id', $id)->get();
        return view('page/each_zoo')->with(['posts' => $post, 'id' => $id ]);
    }
    
    public function each_animal($id)
    {
        $post = Post::where('animal_family_id', $id)->get();
        return view('page/each_animal')->with(['posts' => $post, 'id' => $id ]);
    }
}
