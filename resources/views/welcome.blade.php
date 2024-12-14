@extends('partials.layout')
@section('title', 'HomeMeRR')
@section('content')
    <div class="container mx-auto">
        <div class="my-2 flex justify-center">
            {{ $posts->links() }}
        </div>
        <div class="grid grid-cols-4 gap-4">
            @foreach($posts as $post)
                <div>
                    @include('partials.post-card', ['links' => true])
                </div>
            @endforeach
        </div>
    </div>
@endsection
