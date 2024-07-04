<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all the roles except for the super-admin role

        // if a user has a role of admin or super-admin, they can view all the roles
        if (auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('admin')) {
            $roles = Role::all();
            return Inertia::render('Roles/Index', [
                'roles' => $roles,
            ]);
        }
        // if a user has a role of user, they can view all the roles except for the super-admin and admin role
       $roles = Role::where('name', '!=', 'Super-Admin')->where('name', '!=', 'admin')->get();
        return Inertia::render('Roles/Index', [
            'roles' => $roles,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // validate and create a new role
        return Inertia::render('Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255'
        ]);

        $role = Role::create($validatedData);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Roles/Edit', [
            'role' => Role::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->update($request->all());
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // detroy a role
        $role = Role::find($id);
        $role->delete();

    }
}
