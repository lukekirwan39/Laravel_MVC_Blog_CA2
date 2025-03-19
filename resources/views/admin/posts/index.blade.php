<!-- resources/views/admin/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1>All Posts</h1>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Author</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Created At</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="border px-4 py-2">{{ $post->title }}</td>
                    <td class="border px-4 py-2">{{ $post->user->name }}</td>
                    <td class="border px-4 py-2">{{ $post->category->name }}</td>
                    <td class="border px-4 py-2">{{ $post->created_at->format('jS M Y') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
