<x-app-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-6 col-lg-4">
            <h1 class="mb-4 text-center">Add New Comment</h1>

            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-4">
                    <label for="body" class="form-label">Comment</label>
                    <textarea name="body" id="body" class="form-control form-control-lg shadow-lg border-light" rows="3" required></textarea>
                    @error('body')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="post_id" class="form-label">Post</label>
                    <select name="post_id" id="post_id" class="form-control form-control-lg shadow-lg border-light" required>
                        <option value="">Select Post</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                    @error('post_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 py-3">Add Comment</button>
            </form>
        </div>
    </div>
</x-app-layout>
