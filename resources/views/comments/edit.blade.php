@extends('partials.layout')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-12 col-md-6 col-lg-4">
        <h1 class="mb-4 text-center">Edit Comment</h1>

        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control form-control-lg shadow-lg border-light" rows="6" required>{{ $comment->content }}</textarea>
                @error('content')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 py-3">Update</button>
        </form>
    </div>
</div>
@endsection
