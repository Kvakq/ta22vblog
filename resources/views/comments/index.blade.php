@extends('partials.layout')
@section('content')
<div class="container">
    <a href="{{ route('comments.create') }}" class="btn btn-primary m-2">Add New Comment</a>
    <table class="table table-zebra">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Body</th>
                <th>User</th>
                <th>Post</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $comment->updated_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <div class="join">
                            <a href="{{route('comments.show', ['comment' => $comment])}}" class="btn join-item btn-info">View</a>
                            <a href="{{route('comments.edit', ['comment' => $comment])}}" class="btn join-item btn-warning">Edit</a>
                            <button form="comment-delete-{{$comment->id}}" class="btn join-item btn-error">Delete</button>
                        </div>
                        <form id="comment-delete-{{$comment->id}}" action="{{route('comments.destroy', ['comment' => $comment])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection