@extends('partials.layout')
@section('title', 'Edit User')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">Edit User</h1>
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full">
                        <span class="label-text">Name</span>
                        <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Email</span>
                        <input type="email" name="email" value="{{ $user->email }}" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Password (Leave empty if not changing)</span>
                        <input type="password" name="password" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Confirm Password</span>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full" />
                    </label>
                    <button type="submit" class="btn btn-warning mt-4">Update User</button>
                </form>
            </div>
        </div>
    </div>
@endsection