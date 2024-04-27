<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('role-permissions.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required','string','unique:permissions,name'
       ]);
       Permission::create([
           'name' => $request->name,
           'description' => 'null',
           
       ]);
       return redirect()->route('permissions')->with('status', 'Permission created successfully.');
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
    public function edit(Permission $permission)
    { 
   
return view('role-permissions.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Permission $permission)
    {
        $request->validate([
            'name' => 'required','string','unique:permissions,name'
        ]);
        $permission->update([
            'name' => $request->name,
            'description' => 'null',
        ]);
        return redirect()->route('permissions')->with('status', 'Permission Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions')->with('status', 'Permission deleted successfully.');
    }
}
