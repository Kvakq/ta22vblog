@extends('partials.layout')
@section('content')
<div class="container">
    <h1>Comment Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Comment #{{ $comment->id }}</h5>
            <p class="card-text">Body: {{ $comment->body }}</p>
            <p class="card-text">User: {{ $comment->user->name }}</p>
            <p class="card-text">Post: {{ $comment->post->title }}</p>
            <p class="card-text">Created At: {{ $comment->created_at->format('Y-m-d H:i') }}</p>
            <p class="card-text">Updated At: {{ $comment->updated_at->format('Y-m-d H:i') }}</p>
            <a href="{{ route('comments.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
