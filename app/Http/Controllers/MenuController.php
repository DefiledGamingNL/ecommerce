<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('items')->get();
        return Inertia::render('Menus/Index', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        $menus = Menu::with('items')->get();
        return Inertia::render('Menus/Create', ['menus' => $menus]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Menu::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate(['name' => 'required']);
        $menu->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
