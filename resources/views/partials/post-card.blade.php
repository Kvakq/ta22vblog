<div class="card bg-base-300 shadow-xl min-h-full">
    @if($post->displayImage)
        <figure>
            <img src="{{ $post->displayImage }}" alt="Shoes" />
        </figure>
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p>{{ $post->snippet }}</p>
        <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
        <p class="text-neutral-content">{{ $post->user->name }}</p>
        <div>
            @foreach ($post->tags as $tag)
                <a href="{{route('tag', ['tag' => $tag])}}">
                    <div class="badge badge-outline">{{$tag->name}}</div>
                </a>
            @endforeach
        </div>
        @if(isset($links) && $links)
            <p class="text-neutral-content"><b>Comments: </b>{{ $post->comments_count }}</p>
            <p class="text-neutral-content"><b>Likes: </b>{{ $post->likes_count }}</p>
            

            <div class="card-actions justify-end">
                <form action="{{route('like', ['post' => $post])}}" method="POST">
                    @csrf
                    @if($post->authHasLiked)
                        <button class="btn btn-secondary">Unlike</button>
                    @else
                        <button class="btn btn-primary">Like</button>
                    @endif
                </form>
                <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read more</a>
                <a href="{{ route('comments.create', $post) }}" class="btn btn-primary">Add Comment</a>
                <a href="{{ route('tags.create', ['post' => $post->id]) }}" class="btn btn-primary">Add tag</a>
            </div>
        @endif
    </div>
</div>
