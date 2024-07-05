<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return Inertia::render('Posts/Index', [
            'posts' => $posts->items(),
            'pagination' => [
                'currentPage' => $posts->currentPage(),
                'perPage' => $posts->perPage(),
                'total' => $posts->total(),
                'lastPage' => $posts->lastPage(),
                'nextPage' => $posts->nextPageUrl(),
                'prevPage' => $posts->previousPageUrl(),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        // Handle the image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // Create a new Post instance with the validated data
        Post::create([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'content' => $validatedData['content'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        // Redirect to the posts index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // destroy the post
        Post::destroy($id);
// refresh the vue component page
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
