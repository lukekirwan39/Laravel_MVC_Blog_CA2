<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, \App\Models\Post $post)
    {
        $data = $request->validate([
            'body' => 'required|string|min:3',
            'author_name' => 'nullable|string|max:255',
        ]);

        $post->comments()->create([
            'body' => $data['body'],
            'author_name' => auth()->check() ? auth()->user()->name : ($data['author_name'] ?? 'Guest'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Comment added!');
    }

    public function edit(Comment $comment)
    {
        // Load the post so we can link back to it
        $post = $comment->post;

        return view('front.pages.edit_comment', compact('comment', 'post'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'author_name' => 'required|string|max:255',
            'body'        => 'required|string',
        ]);

        $comment->update($data);

        return redirect()
            ->route('read_post', $comment->post->post_slug)
            ->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $postSlug = $comment->post->post_slug;

        $comment->delete();

        return redirect()
            ->route('read_post', $postSlug)
            ->with('success', 'Comment deleted.');
    }
}
