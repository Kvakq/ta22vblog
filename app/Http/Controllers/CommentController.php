<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'post'])->get(); // Eager load user and post relationships
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new comment.
     */
    public function create()
    {
        $posts = Post::all(); // Get all posts for dropdown selection
        return view('comments.create', compact('posts'));
    }

    /**
     * Store a newly created comment in the database.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        
        Log::info('Attempting to store comment:', $validated);

       
        Comment::create([
            'body' => $validated['body'],
            'post_id' => $validated['post_id'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified comment.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified comment.
     */
    public function edit(Comment $comment)
    {
        $posts = Post::all(); // Get all posts for dropdown selection
        return view('comments.edit', compact('comment', 'posts'));
    }

    /**
     * Update the specified comment in the database.
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment->update($validated);

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified comment from the database.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
