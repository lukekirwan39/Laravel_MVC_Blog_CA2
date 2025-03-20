<?php

namespace App\Http\Controllers;
use App\Models\Post; // ✅ Import the Post model

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all posts
        $posts = Post::latest()->paginate(6); // ✅ Fetch latest 6 posts

        // Pass posts to the view
        return view('home', compact('posts'));
    }

    public function dashboard()
    {
        // ✅ Fetch latest posts (paginate if needed)
        $posts = Post::latest()->paginate(6);

        return view('dashboard', compact('posts')); // ✅ Pass posts to the view
    }
}
