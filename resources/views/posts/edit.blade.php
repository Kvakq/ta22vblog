@extends('partials.layout')
@section('title', 'Edit ' . $post->title)
@section('content')
    <div class="container mx-auto px-8 py-10">
        <div class="card bg-gray-800 text-white shadow-xl w-full md:w-1/2 mx-auto p-8 rounded-lg">
            <div class="card-body">
                <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title input -->
                    <label class="form-control w-full mb-6">
                        <div class="label">
                            <span class="label-text text-lg font-semibold">Title</span>
                        </div>
                        <input
                            name="title"
                            type="text"
                            placeholder="Enter post title"
                            value="{{ old('title') ?? $post->title }}"
                            class="input input-bordered w-full text-lg p-3 rounded-md @error('title') input-error @enderror"
                            required autofocus />
                        <div class="label">
                            @error('title')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <!-- Content input -->
                    <label class="form-control w-full mb-6">
                        <div class="label">
                            <span class="label-text text-lg font-semibold">Content</span>
                        </div>
                        <textarea
                            name="body"
                            rows="12"
                            class="textarea textarea-bordered w-full text-lg p-3 rounded-md @error('body') textarea-error @enderror"
                            required
                            placeholder="Write something cool...">{{ old('body') ?? $post->body }}</textarea>
                        <div class="label">
                            @error('body')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <!-- Submit button -->
                    <div class="mt-6">
                        <input type="submit" class="btn btn-primary w-full py-3 text-lg rounded-lg" value="Update" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
