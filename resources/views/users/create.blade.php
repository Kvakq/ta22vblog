@extends('partials.layout')
@section('title', 'Add User')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">Add User</h1>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <label class="form-control w-full">
                        <span class="label-text">Name</span>
                        <input type="text" name="name" class="input input-bordered w-full" value="{{ old('name') }}" required />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Email</span>
                        <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email') }}" required />
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Password</span>
                        <input type="password" name="password" class="input input-bordered w-full" required />
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <span class="label-text">Confirm Password</span>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full" required />
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <button type="submit" class="btn btn-primary mt-4">Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection