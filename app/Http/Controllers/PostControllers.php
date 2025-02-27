<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostControllers extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('index', compact('posts')); // Change 'posts.index' to 'index'
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'LIKE', "%$query%")
            ->orWhere('content', 'LIKE', "%$query%")
            ->get();

        return view('posts.index', compact('posts'));
    }
}
