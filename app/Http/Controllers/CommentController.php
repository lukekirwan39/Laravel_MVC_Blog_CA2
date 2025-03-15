<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate(['comment' => 'required']);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added!');
    }
}
