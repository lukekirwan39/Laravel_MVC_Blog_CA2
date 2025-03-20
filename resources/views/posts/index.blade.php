@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Posts</h1>
        @foreach ($posts as $post)
            <div class="post">
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->content }}</p>
                <p>Author: {{ $post->user->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
