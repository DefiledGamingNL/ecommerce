<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Pages/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'is_published' => 'required|boolean',
        ]);

//        create the page
        Page::create([
            'title' => $validate['title'],
            'slug' => $validate['slug'],
            'content' => $validate['content'],
            'user_id' => auth()->id(),
            'is_published' => $validate['is_published'],
                ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Pages/Show', [
            'page' => Page::where('slug', $id)->where('is_published', true)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Pages/Edit', [
            'page' => Page::where('id', $id)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'is_published' => 'required|boolean',
        ]);

        $page = Page::where('id', $id)->firstOrFail();

        $page->update([
            'title' => $validate['title'],
            'slug' => $validate['slug'],
            'content' => $validate['content'],
            'is_published' => $validate['is_published'],
        ]);

        // redirect the user to the new url
        //return redirect()->route('pages.edit', $validate['slug']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
