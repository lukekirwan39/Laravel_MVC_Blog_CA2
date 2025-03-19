<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('category', 'user', 'comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = new Post($request->all());
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
