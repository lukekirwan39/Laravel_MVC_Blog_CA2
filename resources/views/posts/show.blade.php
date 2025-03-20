
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');
    body {
        background: #f8f9fa;
        color: #333;
        font-family: 'Poppins', sans-serif;
    }
    .light-text {
        color: #007bff;
        font-weight: 700;
    }
    .soft-button {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 6px;
    }
    .soft-button:hover {
        background: #0056b3;
    }
    .container {
        max-width: 900px;
        margin: auto;
        padding: 40px;
        background: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    .nav-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }
    .nav-link:hover {
        color: #0056b3;
    }
</style>
<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="light-text">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>Category: {{ $post->category->name }}</p>
        <p>Author: {{ $post->user->name }}</p>
        <h3 class="light-text">Comments</h3>
        @foreach ($post->comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
                <p>By: {{ $comment->user->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
