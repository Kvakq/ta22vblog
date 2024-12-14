@extends('partials.layout')
@section('title', 'Create Tag')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <h2 class="text-lg font-bold">Create a New Tag</h2>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tag Name</span>
                        </div>
                        <input name="name" type="text" placeholder="Enter tag name" value="{{ old('name') }}"
                            class="input input-bordered @error('name') input-error @enderror w-full" required autofocus />
                        <div class="label">
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label class="form-control w-full mt-4">
                        <div class="label">
                            <span class="label-text">Attach to Posts</span>
                        </div>
                        <select name="posts[]" multiple class="select select-bordered w-full">
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                        <div class="label">
                            <span class="label-text-alt">Hold Ctrl or Command to select multiple posts.</span>
                        </div>
                    </label>
                    <button type="submit" class="btn btn-primary mt-4">Create Tag</button>
                </form>
            </div>
        </div>
    </div>
@endsection