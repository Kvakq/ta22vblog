@extends('partials.layout')
@section('title', 'Edit Tag')
@section('content')
    <div class="container mx-auto my-8">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back</a>
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h2 class="text-xl font-semibold mb-4">Edit Tag</h2>
                <form action="{{ route('tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full mb-4">
                        <div class="label">
                            <span class="label-text">Tag Name</span>
                        </div>
                        <input type="text" name="name" id="name" class="input input-bordered w-full @error('name') input-error @enderror" value="{{ old('name', $tag->name) }}" required>
                        <div class="label">
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <button type="submit" class="btn btn-warning w-full">Update Tag</button>
                </form>
            </div>
        </div>
    </div>
@endsection