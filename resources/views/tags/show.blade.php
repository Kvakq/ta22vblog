@extends('partials.layout')
@section('title', 'Tag Details')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">{{ $tag->name }}</h1>
                <p class="mb-4">Tag ID: {{ $tag->id }}</p>
                <p class="mb-4">Created At: {{ $tag->created_at->format('M d, Y') }}</p>
                <p class="mb-4">Updated At: {{ $tag->updated_at->format('M d, Y') }}</p>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold">Associated Posts:</h2>
                    <ul>
                        @foreach ($tag->posts as $post)
                            <li class="mb-2">
                                <a href="{{ route('post', $post) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('tags.index') }}" class="btn btn-primary">Back to Tags List</a>
                </div>
            </div>
        </div>
    </div>
@endsection