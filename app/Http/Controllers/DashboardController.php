<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access the dashboard
    }

    public function dashboard()
    {
        $posts = Post::latest()->take(5)->get(); // Get latest 5 posts
        return view('dashboard', compact('posts'));
    }
}
