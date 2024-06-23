<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Posts/Index', [
            'filters' => $request->all('search', 'trashed'),
            'posts' => Post::orderBy('created_at', 'desc')
                ->paginate()
                ->transform(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'slug' => $post->slug,
                        'author' => $post->author->name,
                        'category' => $post->category->only('id', 'title'),
                        'created_at' => $post->created_at,
                        'updated_at' => $post->updated_at,
                    ];
                }),
        ]);
    }
}
