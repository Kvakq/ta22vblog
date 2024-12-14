@extends('partials.layout')
@section('title', 'All Tags')
@section('content')
    <div class="container mx-auto">
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-4">Add Tag</a>
        <div class="text-center my-2">
            {{ $tags->links() }}
        </div>
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="hover">
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="join">
                                <a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn join-item btn-warning">Edit</a>
                                <button form="tag-delete-{{ $tag->id }}" class="btn join-item btn-error">Delete</button>
                            </div>
                            <form id="tag-delete-{{ $tag->id }}" action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection