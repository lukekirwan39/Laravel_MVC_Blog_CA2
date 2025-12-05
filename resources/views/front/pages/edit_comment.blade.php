@extends('front.layouts.pages-layout')

@section('content')
    <div class="container my-4">
        <h2>Edit Comment</h2>

        <p>
            On post:
            <a href="{{ route('read_post', $post->post_slug) }}">
                {{ $post->post_title }}
            </a>
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="author_name" class="form-label">Name</label>
                <input
                    type="text"
                    name="author_name"
                    id="author_name"
                    class="form-control"
                    value="{{ old('author_name', $comment->author_name) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Comment</label>
                <textarea
                    name="body"
                    id="body"
                    rows="4"
                    class="form-control"
                    required
                >{{ old('body', $comment->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('read_post', $post->post_slug) }}" class="btn btn-secondary">
                Cancel
            </a>
        </form>
    </div>
@endsection
