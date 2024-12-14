@extends('partials.layout')
@section('title', $post->title)
@section('content')
    <div class="container mx-auto px-6 py-8">
        
        <div class="mb-8">
            @include('partials.post-card')
        </div>

       
        <div class="mb-6">
            <a href="./comments/create/{{$post->id}}" class="btn btn-primary px-6 py-3">
                Leave the comment
            </a>
        </div>

      
        <h3 class="text-2xl mb-4">Comments:</h3>

     
        @foreach($post->comments()->latest()->get() as $comment)
            <div class="card bg-base-200 shadow-xl mt-4 mb-4">
                <div class="card-body px-6 py-4">
                    <p class="mb-2">{{ $comment->body }}</p>
                    <p class="text-neutral-content text-sm mb-1">{{ $comment->created_at->diffForHumans() }}</p>
                    <p class="text-neutral-content text-sm">{{ $comment->user->name }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
