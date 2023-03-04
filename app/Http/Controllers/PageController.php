<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function archive(Post $post)
    {
        $prevurl = url()->previous();
        $post = $post->get();
        return view('page/archive')->with(['posts' => $post, 'prevurl' => $prevurl]);
    }
    
    public function each_zoo($id)
    {
        $prevurl = url()->previous();
        $post = Post::where('zoo_id', $id)->get();
        return view('page/each_zoo')->with(['posts' => $post, 'id' => $id, 'prevurl' => $prevurl ]);
    }
    
    public function each_animal($id)
    {
        $prevurl = url()->previous();
        $post = Post::where('animal_family_id', $id)->get();
        return view('page/each_animal')->with(['posts' => $post, 'id' => $id, 'prevurl' => $prevurl ]);
    }
    
    public function about()
    {
        $prevurl = url()->previous();
        return view('page/about')->with(['prevurl' => $prevurl ]);
    }
}
