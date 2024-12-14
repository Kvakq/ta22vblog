<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10); // Если нужна пагинация
        return view('tags.index', compact('tags'));
    }
    

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = \App\Models\Post::all(); // Получить все посты
        return view('tags.create', compact('posts')); // Передать их в представление
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Убери вызов authorize, если он есть:
        // $this->authorize('create', Tag::class);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        Tag::create($validated);
    
        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag')); // Return a view to show the tag
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag')); // Return a view for editing the tag
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        // Убедись, что нет вызова authorize, если это не нужно
        // $this->authorize('update', $tag);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $tag->update($validated);
    
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete(); // Delete the tag
        return redirect()->route('tags.index')
                         ->with('success', 'Tag deleted successfully.');
    }
}
