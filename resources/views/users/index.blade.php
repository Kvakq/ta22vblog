@extends('partials.layout')
@section('title', 'Users')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary mb-4" href="{{ route('users.create') }}">Add User</a>
        <div class="text-center my-2">
            {{ $users->links() }}
        </div>
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="join">
                            <a href="{{ route('users.show', $user) }}" class="btn join-item btn-info">View</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn join-item btn-warning">Edit</a>
                                <!-- <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn join-item btn-error">Delete</button>
                                </form> -->
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection