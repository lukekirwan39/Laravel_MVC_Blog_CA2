@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto pt-20">
        <!-- Post Details -->
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <span class="text-gray-500">
            Category: <span class="font-bold italic text-gray-800">{{ $post->category->name }}</span>
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>

        <!-- Comments Section -->
        <div class="comments-section mt-10">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Comments</h3>

            <!-- Display Existing Comments -->
            @foreach ($post->comments as $comment)
                <div class="comment mb-6 p-4 bg-gray-100 rounded-lg">
                    <div class="flex items-center mb-2">
                        <span class="font-bold text-gray-800">{{ $comment->user->name }}</span>
                        <span class="text-sm text-gray-500 ml-4">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            @endforeach

            <!-- Comment Form -->
            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-8">
                    @csrf
                    <textarea
                        name="content"
                        rows="4"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Add a comment..."
                        required
                    ></textarea>
                    <button
                        type="submit"
                        class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300"
                    >
                        Submit Comment
                    </button>
                </form>
            @else
                <p class="mt-8 text-gray-600">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> to leave a comment.
                </p>
            @endauth
        </div>
    </div>
@endsection
