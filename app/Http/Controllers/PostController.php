<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(Request $request)
    {
        $post = $request->route()->parameter('post');
        if($post){
            if(auth()->user()->id !== $post->user->id){
                abort(404);
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user()->associate(auth()->user());
        if($request->has('image')){
            $post->image = $request->file('image')->store('', ['disk' => 'public']);
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        \Log::info('Image for post ' . $post->id . ': ' . $post->image);
    
        
        if ($post->image) {
            $imagePath = 'public/' . $post->image;  
    
           
            if (Storage::exists($imagePath)) {
      
                Storage::delete($imagePath);
                \Log::info('Deleted image: ' . $imagePath);
            } else {
                \Log::warning('Image not found or does not exist: ' . $imagePath);
            }
        } else {
            \Log::warning('No image field in post: ' . $post->id);
        }
    

        $post->delete();
    
        return redirect()->back()->with('success', 'Post and image deleted successfully.');
    }
    
}
