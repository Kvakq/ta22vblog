<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment; 
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(Request $request){
        $posts = Post::with('user')->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }

    public function comment(Comment $comment){
        return view('comment', compact('comment'));
    }

    public function like(Post $post){
        $like = $post->likes()->where('user_id', auth()->user()->id)->first();
        if($like){
            $like->delete();
        } else {
            $like = new Like();
            $like->user()->associate(auth()->user());
            $like->post()->associate($post);
            $like->save();
        }
        return redirect()->back();
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->with('user')->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
