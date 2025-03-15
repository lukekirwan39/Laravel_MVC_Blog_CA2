<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::all();
        return view('admin.dashboard', compact('posts'));
    }

    public function createPost()
    {
        return view('admin.create');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
//            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully');
    }
}
