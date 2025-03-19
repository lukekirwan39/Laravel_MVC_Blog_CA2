<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id(); // Associate with the logged-in user
        $comment->save();

        return redirect()->route('posts.show', $post->slug)->with('success', 'Comment added successfully!');
    }

    // Display comments (handled in the PostController's show method)
}
