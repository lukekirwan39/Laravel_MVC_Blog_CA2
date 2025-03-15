<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model

class PagesController extends Controller
{
    public function index()
    {
        // Fetch all posts from the database
        $posts = Post::latest()->paginate(6); // Fetch latest 6 posts

        // Pass posts to the view
        return view('index', compact('posts'));
    }

    // ✅ ADD THIS FUNCTION FOR THE ABOUT PAGE
    public function about()
    {
        return view('about'); // Points to resources/views/about.blade.php
    }

    // ✅ ADD THIS FUNCTION FOR THE CONTACT PAGE
    public function contact()
    {
        return view('contact'); // Points to resources/views/contact.blade.php
    }
}
